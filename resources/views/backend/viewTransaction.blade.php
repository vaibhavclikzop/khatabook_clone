@extends('layouts.main')
@section('main-section')
    @php
        $edit = 0;
    @endphp
    @foreach ($rolePermissions as $item)
        @if ($item->permission_id == 2 && $item->edit == 1 && $item->view == 1)
            @php
                $edit = 1;
            @endphp
        @endif
    @endforeach


    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="page-title">
                <h4>{{ $customer->name }} Transactions</h4>
                <button class="btn btn-warning btn-sm" title="Download PDF" onclick="generatePDF()"><i
                        class="fa-solid fa-file-pdf"></i></button>
            </div>
            <div class="col-md-2 text-end {{ $balance > 0 ? 'text-danger' : 'text-success' }}">
                Balance = {{ $balance }}
            </div>


        </div>


        <div class="card-body">

            <table class="table dataTable" id="printorder">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Payment Mode</th>
                        <th>Transaction Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($transactions as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->customer->name ?? 'N/A' }}</td>
                            <td>{{ $row->user->name ?? 'N/A' }}</td>
                            <td>{{ $row->amount }}</td>
                            <td
                                style="color: {{ $row->type == 'give' ? 'red' : ($row->type == 'take' ? 'green' : 'white') }};">
                                {{ $row->type }}
                            </td>

                            <td>{{ $row->description }}</td>
                            <td>
                                @if (!empty($row->file))
                                    <img src="{{ asset("attachments/".$row->file) }}" alt="Transaction Image" width="50">
                                @else
                                    <img src="{{ asset('images/no_image.jpg') }}" alt="No Image" width="50">
                                @endif
                            </td>
                            <td>{{ $row->payment_mode }}</td>
                            <td>{{ date('Y-m-d', strtotime($row->transaction_date)) }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <button class="btn btn-primary btn-sm edit transaction" type="button"
                                        title="Edit Transaction" data-id="{{ $row->id }}"
                                        data-customer="{{ $row->customer_id }}" data-amount="{{ $row->amount }}"
                                        data-type="{{ $row->type }}" data-description="{{ $row->description }}"
                                        data-payment_mode="{{ $row->payment_mode }}" data-reference="{{ $row->ref_id }}"
                                        data-transaction_date="{{ date('Y-m-d', strtotime($row->transaction_date)) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>

                                    <form action="{{ route('transaction.delete', $row->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Transaction">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    {{-- this model for transaction edit --}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="needs-validation" novalidate method="POST" action="{{ route('edit_transaction') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                                required>
                        </div>

                        <!-- Type -->
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" class="form-control" id="type" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="take">Take</option>
                                <option value="give">Give</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <!-- File Upload -->
                        <div class="mb-3">
                            <label for="file" class="form-label">Upload File</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>

                        <!-- Payment Mode -->
                        <div class="mb-3">
                            <label for="payment_mode" class="form-label">Payment Mode</label>
                            <select name="payment_mode" class="form-control" id="payment_mode" required>
                                <option value="" selected disabled>Select Mode</option>
                                <option value="card">Card</option>
                                <option value="cash">Cash</option>
                                <option value="upi">UPI</option>
                                <option value="net banking">Net Banking</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ref_id" class="form-label">Reference</label>
                            <input type="text" class="form-control" name="ref_id" id="ref_id"
                                placeholder="Add Reference">
                        </div>

                        <!-- Transaction Date -->
                        <div class="mb-3">
                            <label for="transaction_date" class="form-label">Transaction Date</label>
                            <input type="date" class="form-control" id="transaction_date" name="transaction_date"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit Transaction</button>
                    </div>
                    <input type="hidden" id="customer_id" name="customer_id" value="{{ $id }}">
                    <input type="hidden" name="transaction_id" id="transaction_id">
                </div>
            </form>
        </div>
    </div>




    <script>
        $(document).on("click", ".edit", function() {
            $("#id").val($(this).data("id"));
            $("#amount").val($(this).data("amount"))
            $("#type").val($(this).data("type"))
            $("#description").val($(this).data("description"))
            $("#payment_mode").val($(this).data("payment_mode"))
            $("#transaction_date").val($(this).data("transaction_date"))
            $("#ref_id").val($(this).data("reference"))

            $("#exampleModalLabel").text("Update Transaction");

            $("#exampleModal1").modal("show");
        });


        $(document).ready(function() {
            $(document).on("click", ".transaction", function() {
                var id = $(this).data('id');
                console.log(id);
                $("#transaction_id").val($(this).data("id"));

            });
        });

        // $(document).ready(function() {
        //     $('.transaction').on('click', function() {
        //         var url = window.location.href.replace(/\/$/, ''); // Remove trailing slash if any
        //         var segments = url.split('/');
        //         var id = segments[segments.length - 1]; // Get the last part of the URL

        //         console.log("Clicked ID:", id);
        //     });
        // });
    </script>
@endsection
