@extends('layouts.main')
@section('main-section')
    @php
        $edit = 0;
    @endphp
    @foreach ($rolePermissions as $item)
        @if ($item->permission_id == 5 && $item->edit == 1 && $item->view == 1)
            @php
                $edit = 1;
            @endphp
        @endif
    @endforeach
    <div class="card">
        <div class="card-header d-flex justify-content-between">

            <!-- Bootstrap Nav Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ Request::is('v1/customers*') ? 'active' : '' }}" id="customer-tab"
                        data-bs-toggle="tab" data-bs-target="#customer-tab-pane" type="button" role="tab">
                        Customer
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ Request::is('v1/suppliers*') ? 'active' : '' }}" id="supplier-tab"
                        data-bs-toggle="tab" data-bs-target="#supplier-tab-pane" type="button" role="tab">
                        Supplier
                    </button>
                </li>
            </ul>

            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <strong>There were some errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div>
                @if ($edit == 1)
                    <button type="button" class="btn btn-primary add">
                        <i class="fa fa-plus"></i>
                        {{ request()->is('*/supplier*') ? 'Add Supplier' : 'Add Customer' }}
                    </button>
                @endif
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="p-3 border bg-light text-center">You'll Give &nbsp;&nbsp; <span
                            class="text-success">{{ $takeTotal }}</span> </div>
                </div>
                <div class="col-4">
                    <div class="p-3 border bg-light text-center">You'll Get &nbsp;&nbsp; <span
                            class="text-danger">{{ $giveTotal }}</span></div>
                </div>
                {{-- <div class="col-4">
                    <div class="p-3 border bg-light text-center"> </div>
                </div> --}}
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Left Column -->
                <div class="col-6">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="customer-tab-pane" role="tabpanel">
                            <table class="table dataTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sno = 1;
                                    @endphp
                                    @foreach ($customers as $item)
                                        <tr class="customer" data-id="{{ $item->id }} " data-type="customer">
                                            <td>{{ $sno++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-danger balance{{$item->id}}"></td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}"
                                                    class="btn btn-success btn-sm transaction" data-bs-toggle="modal"
                                                    title="Add Transaction" data-bs-target="#exampleModal1">
                                                    <i class="fa-solid fa-money-bill"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="tab-pane fade" id="supplier-tab-pane" role="tabpanel">
                            <table class="table dataTable">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $sno = 1;
                                    @endphp
                                    @foreach ($supplier as $item)
                                        <tr class="customer" data-id="{{ $item->id }}" data-type="supplier">
                                            <td>{{ $sno++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td class="text-danger"></td>
                                            <td>
                                                <button type="button" data-id="{{ $item->id }}"
                                                    class="btn btn-success btn-sm transaction" data-bs-toggle="modal"
                                                    title="Add Transaction" data-bs-target="#exampleModal1">
                                                    <i class="fa-solid fa-money-bill"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-6">
                    <div class="p-3 border bg-light">

                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-4 name">
                                    
                                </div>
                                <div class="col-4">
                               
                                </div>
                                <div class="col-4">
                                    <div class="p-3 border bg-light text-center">Balance &nbsp;&nbsp; <span
                                            class="text-success balance"></span></div>
                                </div>

                            </div>
                        </div>

                        <table class="table " id="printorder" style="display:none;">
                            <thead>
                                <tr>
                                    <th>#</th>

                                    <th>Amount</th>
                                    <th>You Gave</th>
                                    <th>You Got</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- This will be filled dynamically by JS --}}
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>




    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog modal-lg">
            <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('SaveCustomer') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><span id="modal_name"> Add customers</span></h5>
                        <button type="button" class="bs-close" data-bs-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="modal-body row">

                        <input type="hidden" name="id" id="id">


                        <div class="col-md-6 mt-4">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>

                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Number</label>
                            <input type="number" name="number" id="number" class="form-control" required>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">DOB</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                        </div>



                        <div class="col-md-12 mt-4">
                            <label for="">Address</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>

                        <div class="col-md-6 mt-4">
                            <label for="">Active</label>
                            <select name="active" id="active" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-4">
                            <label for="">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="" disabled>Select Type</option>
                                <option value="customer">Customer</option>
                                <option value="supplier">Supplier</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    {{-- this is transaction model --}}

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="needs-validation" novalidate method="POST" action="{{ route('saveTransaction') }}"
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
                            <select name="type" class="form-control" id="" required>
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
                            <select name="payment_mode" class="form-control" id="" required>
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
                        <button type="submit" class="btn btn-primary">Add Transaction</button>
                    </div>
                    <input type="hidden" id="customer_id" name="customer_id" value="">
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).on("click", ".edit", function() {
            $("#id").val($(this).data("id"));
            $("#company_id").val($(this).data("company_id"));
            $("#name").val($(this).data("name"));
            $("#number").val($(this).data("number"));
            $("#email").val($(this).data("email"));
            $("#gst").val($(this).data("gst"));
            $("#address").val($(this).data("address"));
            $("#state").val($(this).data("state"));
            $("#city").html("<option value=" + $(this).data("city") + ">" + $(this).data("city") + "</option>");
            $("#pincode").val($(this).data("pincode"));
            $("#active").val($(this).data("active"));
            $("#dob").val($(this).data("dob"));
            $("#pan_card").val($(this).data("pan_card"));
            $("#adhar_card").val($(this).data("adhar_card"));
            $("#project").val($(this).data("project"));
            $("#unit_no").val($(this).data("unit_no"));
            $("#so_wo").val($(this).data("so_wo"));
            $("#city1").val($(this).data("city1"));
            $("#rating").val($(this).data("rating"));
            $('#type').val($(this).data('type'));


            $("#modal_name").text("Update customers");

            if ($(this).data("source") == "Reference") {
                $(".reference").show();
            } else {
                $(".reference").hide();
            }
            $("#exampleModal").modal("show");
        });


        $(".add").on("click", function() {
            $("#modal_name").text("Add customers");



            $("#id").val("");

            $("#exampleModal").modal("show");
        });
        $(".reference").hide();
        $("#source").on("change", function() {
            if ($(this).val() == "Reference") {
                $(".reference").show(500);
            } else {
                $(".reference").hide(500);
            }
        });


        $("#state").on("change", function() {
            $.ajax({
                url: "/GetCity",
                type: "POST",
                data: {
                    state: $(this).val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(result) {
                    var html = "";
                    html += '<option value="">----Select City----</option>';
                    result.forEach(element => {

                        html += '<option value="' + element.city + '">' + element.city +
                            '</option>';
                    });
                    $("#city").html(html)
                },
                error: function(result) {
                    console.log(result);
                }
            });

        })

        $(document).ready(function() {
            $(document).on("click", ".transaction", function() {
                var id = $(this).data('id');
                console.log(id);
                $("#customer_id").val($(this).data("id"));

            });
        });



        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on("click", ".customer", function() {
                var id = $(this).data("id");


                $.ajax({
                    url: '{{ route('viewTransaction') }}',
                    type: 'post',
                    data: {
                        id: id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Success:', response);

                        var transactions = response.transactions;
                        var tbody = $('#printorder tbody');
                        tbody.empty(); // Clear existing rows

                        transactions.forEach(function(row, index) {
                            var imagePath = row.file ?
                                '/attachments/' + row.file :
                                '/images/no_image.jpg';

                            var typeColor = row.type === 'give' ? 'green' : (row
                                .type === 'take' ? 'red' : 'black');

                            var transactionDate = new Date(row.transaction_date)
                                .toISOString().split('T')[0];

                            var html = `
            <tr>
                <td>${index + 1}</td>
        
                <td>${row.amount}</td>
                <td style="color: ${typeColor};">${row.type}</td>
         
                <td>
                    <div class="d-flex gap-1">
                       
                        <form action="/transaction/delete/${row.id}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm" title="Delete Transaction">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        `;

                            tbody.append(html);
                        });

                        // Optional: Show the table if it was hidden
                        $('#printorder').show();

                        $('.name').text("Name = " + response.customer['name']);
                        $('.balance'+id).text(response.balance);
                        $('.balance').text(response.balance);


                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
