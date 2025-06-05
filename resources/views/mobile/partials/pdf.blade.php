<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="card">
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
                    <h6>₹{{ number_format($transactions->where('t_type', 'take')->sum('amount'), 2) }}</h6>
                </div>
                <div class="col">
                    <p>Total Credit</p>
                    <h6>₹{{ number_format($transactions->where('t_type', 'give')->sum('amount'), 2) }}</h6>
                </div>
                <div class="col">
                    <p>Net Balance</p>
                    <h6 class="{{ $finalAmount < 0 ? 'text-danger' : 'text-success' }}">
                        ₹{{ number_format(abs($finalAmount), 2) }} {{ $finalAmount < 0}}
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
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d-M-Y') }}</td>
                                <td>
                                    @if (!empty($transaction->attachment))
                                        <a href="{{ asset('uploads/transactions/' . basename($transaction->attachment)) }}" target="_blank">
                                            <img src="{{ asset('uploads/transactions/' . basename($transaction->attachment)) }}" alt="Attachment">
                                        </a>
                                    @else
                                        <span>No Attachment</span>
                                    @endif
                                </td>
                                <td>{{ $transaction->t_type === 'take' ? number_format($transaction->amount, 2) : '' }}</td>
                                <td>{{ $transaction->t_type === 'give' ? number_format($transaction->amount, 2) : '' }}</td>
                                 <td>₹{{ number_format($finalAmount, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            <div class="text-end mb-3 no-print">
                <button onclick="window.print()" class="btn btn-primary">Print Statement</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
