<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card-header {
            background-color: #007bff !important;
            color: #fff;
        }

        .table-container {
            overflow-x: auto; 
            white-space: nowrap; 
        }

        .table {
            min-width: 100%; 
            border-collapse: collapse;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            padding: 0.75rem;
        }

        .table td img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: auto;
            cursor: pointer;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid mt-4">
    <div class="col-12 no-print">
        <a href="{{ route('view.transaction', ['id' => $customer->id]) }}">
            <i class="fa fa-arrow-left fs-3"></i>
        </a>
    </div>
    <div class="card mt-3">
        <div class="card-header text-center">
            <h5>{{ $customer->name }}</h5>
            <p class="mb-0">Phone Number: {{ $customer->number }}</p>
            <p class="mb-0">({{ $oldestTransactionDate }} - {{ $latestTransactionDate }})</p>
        </div>
        <div class="card-body">
            <div class="row text-center mb-3">
                <div class="col">
                    <p>Opening Balance</p>
                    <h6>₹{{ number_format($oldestTransaction->amount ?? 0, 2) }}</h6>
                </div>
                <div class="col">
                    <p>Total Debit</p>
                    <h6>₹{{ number_format($transactions->where('t_type', 'give')->sum('amount'), 2) }}</h6>
                </div>
                <div class="col">
                    <p>Total Credit</p>
                    <h6>₹{{ number_format($transactions->where('t_type', 'take')->sum('amount'), 2) }}</h6>
                </div>
                <div class="col">
                    <p>Net Balance</p>
                    <h6 class="{{ $finalAmount < 0 ? 'text-danger' : 'text-success' }}">
                        {{ $finalAmount < 0 ? '-' : '' }} ₹{{ number_format(str_replace('-', '', abs($finalAmount)), 2) }}
                    </h6>
                </div>
            </div>
            <div class="table-container">
                <p class="mb-0">Total Entries: {{ $totalEntries }}</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Debit (₹)</th>
                            <th>Credit (₹)</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $runningBalance = $oldestTransaction->amount ?? 0;
                            $totalDebit = 0;
                            $totalCredit = 0;
                        @endphp

                        @foreach ($transactions as $transaction)
                            @php
                                if ($transaction->t_type === 'take') 
                                {
                                    $runningBalance -= $transaction->amount;
                                    $totalCredit += $transaction->amount;
                                } 
                                elseif ($transaction->t_type === 'give') 
                                {
                                    $runningBalance += $transaction->amount;
                                    $totalDebit += $transaction->amount;
                                }
                            @endphp
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-M-Y') }}</td>
                                <td>
                                    @if (!empty($transaction->attachment))
                                        <a href="{{ asset('attachments/' . basename($transaction->attachment)) }}" target="_blank">
                                            attachment
                                        </a>
                                    @else
                                        <span>No Attachment</span>
                                    @endif
                                </td>
                                <td>{{ $transaction->t_type === 'give' ? '₹ ' . number_format($transaction->amount, 2) : '' }}</td>
                                <td>{{ $transaction->t_type === 'take' ? '₹ ' . number_format($transaction->amount, 2) : '' }}</td>
                                <td>
                                    {{ $runningBalance < 0 
                                    ? '- ₹ ' . number_format(abs($runningBalance), 2) 
                                    : '₹ ' . number_format($runningBalance, 2) }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="table-secondary">
                            <th colspan="2">Totals:</th>
                            <th>₹{{ $totalDebit < 0 ? '- ₹ ' . number_format(abs($totalDebit), 2) : number_format($totalDebit, 2) }}</th>
                            <th>₹{{ $totalCredit < 0 ? '- ₹ ' . number_format(abs($totalCredit), 2) : number_format($totalCredit, 2) }}</th>
                            <th class="{{ $runningBalance < 0 ? 'text-success' : 'text-danger' }}">{{ $runningBalance < 0 ? '₹ ' . number_format(abs($runningBalance), 2) : '- ₹ ' . number_format($runningBalance, 2) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            <div class="text-end mb-3 no-print">
                <a href="{{ route('generate.pdf.report', ['id' => $customer->id]) }}" target="_blank" class="text-decoration-none"> Print Statement </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>