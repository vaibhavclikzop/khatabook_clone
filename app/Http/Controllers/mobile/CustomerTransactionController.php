<?php
namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Flasher\Laravel\Facade\Flasher;
use App\Models\Transaction;
use Carbon\Carbon;
use TCPDF;

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

        $oldestTransaction = DB::table('transactions')
        ->where('customer_id', $id)
        ->orderBy('created_at', 'asc')
        ->first();

        $oldestTransactionDate = $oldestTransaction
            ? Carbon::parse($oldestTransaction->created_at)->format('d-M-Y')
            : null;

        $latestTransaction = DB::table('transactions')
            ->where('customer_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();

        $latestTransactionDate = $latestTransaction
            ? Carbon::parse($latestTransaction->created_at)->format('d-M-Y')
            : null;

        $totalEntries = DB::table('transactions')
        ->where('customer_id', $id)
        ->count();

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

        return view('mobile/customer-transaction/transaction', compact('transactions', 'customer', 'latestAmount', 'finalAmount', 'oldestTransactionDate', 'latestTransactionDate', 'totalEntries'));
    }

    public function generate_report($id)
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

        $oldestTransaction = DB::table('transactions')
        ->where('customer_id', $id)
        ->orderBy('created_at', 'asc')
        ->first();

        $oldestTransactionDate = $oldestTransaction
            ? Carbon::parse($oldestTransaction->created_at)->format('d-M-Y')
            : null;

        $latestTransaction = DB::table('transactions')
            ->where('customer_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();

        $latestTransactionDate = $latestTransaction
            ? Carbon::parse($latestTransaction->created_at)->format('d-M-Y')
            : null;

        $totalEntries = DB::table('transactions')
        ->where('customer_id', $id)
        ->count();

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

        return view('mobile/partials/pdf', compact('transactions', 'customer', 'latestAmount', 'finalAmount', 'oldestTransactionDate', 'latestTransactionDate', 'totalEntries'));
    }
    
    public function generate_pdf_report($id)
    {
        $customer = DB::table('customers')->find($id);
        if (!$customer) 
        {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        $transactions = DB::table('transactions')
            ->where('customer_id', $id)
            ->orderBy('created_at', 'asc')
            ->get(['id', 'transaction_date', 'type', 'amount', 'attachment', 'created_at']);

        $totalEntries = $transactions->count();
        $totalDebit = 0;
        $totalCredit = 0;
        $runningBalance = 0;
        $transactionRows = '';
        $oldestTransactionDate = $transactions->isNotEmpty() ? Carbon::parse($transactions->last()->transaction_date)->format('d-M-Y') : 'N/A';
        $latestTransactionDate = $transactions->isNotEmpty() ? Carbon::parse($transactions->first()->transaction_date)->format('d-M-Y') : 'N/A';

        foreach ($transactions as $transaction) 
        {
            $amount = $transaction->amount;

            if ($transaction->type === 'give') 
            {
                $totalDebit += $amount;
                $runningBalance += $amount;
            } 
            elseif ($transaction->type === 'take') 
            {
                $totalCredit += $amount;
                $runningBalance -= $amount;
            }

            $transactionRows .= '<tr>'
            . '<td style="line-height:30px !important;">' 
                . Carbon::parse($transaction->transaction_date)->format('d-M-Y') 
            . '</td>'
            . '<td style="line-height:30px !important;">' 
                . ($transaction->attachment 
                    ? '<a href="' . htmlspecialchars(url('attachments/' . basename($transaction->attachment))) . '" target="_blank">attachment</a>' 
                    : 'No Attachment') 
            . '</td>'
            . '<td style="line-height:30px !important;">' 
                . ($transaction->type === 'give' ? '₹ ' . number_format($amount, 2) : '') 
            . '</td>'
            . '<td style="line-height:30px !important;">' 
                . ($transaction->type === 'take' ? '₹ ' . number_format($amount, 2) : '') 
            . '</td>'
            . '<td style="line-height:30px !important;">' 
                . ($runningBalance < 0 
                    ? '- ₹ ' . number_format(abs($runningBalance), 2) 
                    : '₹ ' . number_format($runningBalance, 2)) 
            . '</td>'
            . '</tr>';
        }

        $finalAmountColor = $runningBalance < 0 ? 'green' : 'red';
        $transactionRows .= '<tr style="font-weight: bold;">'
        . '<td colspan="2" style="text-align: right; line-height:30px !important;">Totals:</td>'
        . '<td style="line-height:30px !important; color: #000;">₹ ' . number_format($totalDebit, 2) . '</td>'
        . '<td style="line-height:30px !important; color: #000;">₹ ' . number_format($totalCredit, 2) . '</td>'
        . '<td style="line-height:30px !important; color: ' . $finalAmountColor . ';">' 
        . ($runningBalance < 0 ? '₹ ' . number_format(abs($runningBalance), 2) : '- ₹ ' . number_format($runningBalance, 2)) 
        . '</td>'
        . '</tr>';

        $html = <<<HTML
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 15px;
            }
            .header {
                background-color:#007bff;
                color: white;
                padding: 15px;
                text-align: center;
                margin-bottom: 15px;
                border-radius: 5px;
            }
            .summary-table {
                width: 100%;
                margin-bottom: 15px;
                border-collapse: collapse;
                text-align: center;
            }
            .summary-table td {
                padding: 8px;
                border: none;
            }
            .data-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 15px;
            }
            .data-table th, .data-table td {
                padding: 10px;
                text-align: center;
                border: 1px solid #ddd;
            }
            .data-table th {
                background-color: #f8f9fa;
            }
        </style>

        <div class="header" style="line-height:8px !important;">
            <h2>{$customer->name}</h2>
            <p style="line-height:10px !important;">Phone Number: {$customer->number}</p>
            <p style="line-height:10px !important;">({$oldestTransactionDate} - {$latestTransactionDate})</p>
        </div>
        <table class="summary-table">
            <br><br>
            <tr>
                <td><strong>Opening Balance:</strong><br><br> ₹0.00</td>
                <td><strong>Total Debit:</strong><br><br> ₹{$totalDebit}</td>
                <td><strong>Total Credit:</strong><br><br> ₹{$totalCredit}</td>
                <td><strong>Net Balance:</strong><br><br> <span style="color:{$finalAmountColor}">₹{$runningBalance}</span></td>
            </tr>
        </table><br>

        <p><strong>Total Entries:</strong> {$totalEntries}</p>

        <table class="data-table">
            <thead>
                <tr style="line-height:20px !important;">
                    <th style="line-height:30px !important;">Date</th>
                    <th style="line-height:30px !important;">Details</th>
                    <th style="line-height:30px !important;">Debit (₹)</th>
                    <th style="line-height:30px !important;">Credit (₹)</th>
                    <th style="line-height:30px !important;">Balance (₹)</th>
                </tr>
            </thead>
            <tbody>
                {$transactionRows}
            </tbody>
        </table>
        HTML;
            $pdf = new TCPDF();
            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);
            $pdf->AddPage();
            $pdf->SetFont('dejavusans', '', 10);
            $pdf->writeHTML($html, true, false, true, false, '');

        return $pdf->Output('statement.pdf', 'I');
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
                $filePath = time() . '.' . $request->file('attachment')->extension();
                $request->file('attachment')->move('attachments', $filePath);
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
            'attachment'       => 'nullable|file|mimes:jpeg,jpg,png',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->amount = $request->amount;
        $transaction->description = $request->description;
        $transaction->transaction_date = $request->transaction_date;
        if ($request->hasFile('attachment')) 
        {
            $filePath = time() . '.' . $request->file('attachment')->extension();
            $request->file('attachment')->move('attachments', $filePath);
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