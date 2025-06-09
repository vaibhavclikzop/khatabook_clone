<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\TransactionRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Traits\CustomTrait;
use Carbon\Carbon;

class TransactionController extends Controller
{

    use CustomTrait;

    public function saveTransaction(TransactionRequest $request)
    {


        $data = $request->validated();

        $file = "";
        if ($request->hasFile('file')) {
            $file = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move('attachments', $file);
        }

        $data['user_id'] = $request->user->id;
        $data['file'] = $file;


        DB::beginTransaction();

        try {
            $transaction = Transaction::create($data);

            DB::commit();

            return redirect()->back()->with('success', 'Trasaction Create Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e);
        }
    }

    public function transactions()
    {
        $query = Transaction::with(['user', 'customer']);

        if (!empty($_GET['customer_id']) && $_GET['customer_id'] != 0) {
            $query->where('customer_id', $_GET['customer_id']);
        }

        if (!empty($_GET['from_date']) && !empty($_GET['to_date'])) {
            $from = Carbon::parse($_GET['from_date'])->startOfDay();
            $to = Carbon::parse($_GET['to_date'])->endOfDay();
            $query->whereBetween('created_at', [$from, $to] );
        } elseif (!empty($_GET['from_date'])) {
            $query->whereDate('created_at', '>=', $_GET['from_date']);
        } elseif (!empty($_GET['to_date'])) {
            $query->whereDate('created_at', '<=', $_GET['to_date']);
        }

        $transactions = $query->get();
        $customers = Customer::get();

        return view('backend.transaction', compact('transactions', 'customers'));
    }


    // public function viewTransactions($id)
    // {

    //     $transactions = Transaction::where('customer_id', $id)->get();

    //     $customer = Customer::find($id);

    //     $giveTotal = Transaction::where('customer_id', $id)
    //         ->where('type', 'give')
    //         ->sum('amount');



    //     $takeTotal = Transaction::where('customer_id', $id)
    //         ->where('type', 'take')
    //         ->sum('amount');

    //     $amount = $giveTotal - $takeTotal;

    //     $balance = $this->formatIndianRupee($amount);

    //     return view('backend.viewTransaction', compact('transactions', 'customer', 'giveTotal', 'takeTotal', 'balance', 'id'));
    // }

public function viewTransactions(Request $request) 
{
    $id = $request->input('id');

    $transactions = Transaction::where('customer_id', $id)->get();
    $customer = Customer::find($id);

    $giveTotal = Transaction::where('customer_id', $id)
        ->where('type', 'give')
        ->sum('amount');

    $takeTotal = Transaction::where('customer_id', $id)
        ->where('type', 'take')
        ->sum('amount');

    $amount = $giveTotal - $takeTotal;
    $balance = $this->formatIndianRupee($amount);

    return response()->json([
        'transactions' => $transactions,
        'customer' => $customer,
        'giveTotal' => $giveTotal,
        'takeTotal' => $takeTotal,
        'balance' => $balance,
        'id' => $id
    ]);
}



    public function editTransaction(TransactionRequest $request)
    {
        $transaction = Transaction::where('id', $request->transaction_id)->first();

             $file = "";
        if ($request->hasFile('file')) {
            $file = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move('attachments', $file);
        } 

        if ($transaction) {

            $transaction->amount = $request->amount;
            $transaction->type = $request->type;
            $transaction->description = $request->description;
            $transaction->payment_mode = $request->payment_mode;
            $transaction->transaction_date = $request->transaction_date;
            $transaction->ref_id = $request->ref_id;
            $transaction->file = $file;
            $transaction->save();

            return redirect()->back()->with('success', 'Transaction updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Transaction not found.');
        }
    }

    public function deleteTransaction($id)
    {

        $transaction = Transaction::find($id);

        if ($transaction) {
            $transaction->delete();
            return redirect()->back()->with('success', 'Transaction deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Transaction not found.');
        }
    }
}