<?php
namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Flasher\Laravel\Facade\Flasher;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

class CustomerTransactionController extends Controller
{
    public function view_transaction($id)
    {
        $transactions = DB::table('transactions')
        ->join('customers', 'customers.id', '=', 'transactions.customer_id')
        ->where('transactions.customer_id', $id)
        ->select('transactions.id as t_id', 'transactions.type as t_type', 'transactions.*', 'customers.*')
        ->paginate(10);

        $customer = DB::table('customers')
        ->where('id',$id)
        ->first();

       $latestAmount = DB::table('transactions')
        ->where('customer_id', $id)
        ->orderBy('created_at', 'desc') 
        ->value('amount');

        $finalAmount = 0;

        foreach ($transactions as $transaction) 
        {
            if ($transaction->t_type === 'take') 
            {
                $finalAmount += $transaction->amount;
            } 
            elseif ($transaction->t_type === 'give') 
            {
                $finalAmount -= $transaction->amount;
            }
        }

        return view('mobile/customer-transaction/transaction', compact('transactions', 'customer', 'latestAmount', 'finalAmount'));
    }

    public function gave_money(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required|integer|exists:customers,id',
            'user_id'     => 'required|integer|exists:users,id',
            'amount'      => 'required|numeric|min:0.01',
            'type'        => 'required|in:give,take',
            'description' => 'nullable',
            'transaction_date' => 'nullable|date',
            'attachment'  => 'nullable|file|mimes:jpeg,jpg,png,pdf,xls,xlsx|max:2048',
        ]);

        if ($validator->fails()) 
        {
            Flasher::addError('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try 
        {
            DB::beginTransaction();

            $filePath = null;
            if ($request->hasFile('attachment')) 
            {
                $filePath = $request->file('attachment')->store('attachments', 'public');
            }

            DB::table('transactions')->insert([
                'customer_id'      => $request->customer_id,
                'user_id'          => $request->user_id,
                'amount'           => $request->amount,
                'type'             => $request->type,
                'description' => $request->description,
                'transaction_date' => $request->transaction_date ? $request->transaction_date : now(),
                'attachment'       => $filePath,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);

            DB::commit();

            Flasher::addSuccess('Success', 'Transaction recorded successfully.');
            return redirect()->back();
        } 
        catch (Exception $e) 
        {
            DB::rollBack();
            Flasher::addError('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function view_transaction_detail($id)
    {
        $transaction = DB::table('transactions')
        ->where('transactions.id', $id) 
        ->first();

        $customer = DB::table('customers')
        ->where('id',$transaction->customer_id)
        ->first();

       $latestAmount = DB::table('transactions')
        ->where('customer_id', $id)
        ->orderBy('created_at', 'desc') 
        ->value('amount');

        $customer_id = $transaction->customer_id;
        return view('mobile/customer-transaction/transaction-detail', compact('transaction', 'customer', 'latestAmount', 'customer_id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount'           => 'required|numeric|min:0.01',
            'description'      => 'nullable|string',
            'transaction_date' => 'nullable|date',
            'attachment'       => 'nullable|file|mimes:jpeg,jpg,png,pdf,xls,xlsx|max:5120',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->transaction_date = $request->transaction_date;
        if ($request->hasFile('attachment')) 
        {
            if ($transaction->attachment && file_exists(storage_path('app/public/' . $transaction->attachment))) 
            {
                unlink(storage_path('app/public/' . $transaction->attachment));
            }
            $filePath = $request->file('attachment')->store('attachments', 'public');
            $transaction->attachment = $filePath;
        }

        $transaction->save();

        return redirect()->back()->with('success', 'Transaction updated successfully.');
    }


    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('view.transaction', ['id' => $transaction->customer_id])
        ->with('success', 'Transaction deleted successfully.');
    }

    public function customer_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:255',
            'number' => 'required|string|max:20',
        ]);

        if ($validator->fails()) 
        {
            Flasher::addError('Error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try 
        {
            DB::table('customers')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('name'),
                    'number' => $request->input('number'),
                    'updated_at' => now()
                ]);

            Flasher::addSuccess('Customer updated successfully.');
            return redirect()->back();
        } 
        catch (\Exception $e) 
        {
            Flasher::addError('Error', 'Failed to update customer.');
            return redirect()->back();
        }
    }

    public function customer_delete($id)
    {
        try 
        {
            DB::beginTransaction();
            DB::table('transactions')->where('customer_id', $id)->delete();
            DB::table('customers')->where('id', $id)->delete();
            DB::commit();
            Flasher::addSuccess('Customer deleted successfully.');
            return redirect()->route('dashboard.view');
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            Flasher::addError('Error', 'Failed to delete customer.');
            return redirect()->back();
        }
    }

}