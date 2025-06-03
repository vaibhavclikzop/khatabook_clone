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
            <div class="page-title">
                <h4>{{ request()->is('*/supplier*') ? 'Supplier List' : 'Customer List' }}</h4>
                @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>There were some errors:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            </div>
            <div>
                @if ($edit == 1)
                    <button type="button" class="btn btn-primary add">
                        <i class="fa fa-plus"></i>
                        {{ request()->is('*/supplier*') ? 'Add Supplier' : 'Add Customer' }}
                    </button>
                @endif
            </div>
        </div>

        <div class="card-body">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>District</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>Active</th>
                        @if ($edit == 1)
                            <th>Action</th>
                        @endif


                    </tr>
                </thead>
                <tbody>
                    @php
                        $sno = 1;
                    @endphp
                    @foreach ($customers as $item)
                        <tr>
                            <td>{{ $sno++ }}</td>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->email }}</td>

                            <td>{{ $item->address }}</td>
                            <td>{{ $item->city1 }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->state }}</td>
                            <td>{{ $item->pincode }}</td>

                            @if ($item->active == 1)
                                <td><span class="badge badge-success">Active</span></td>
                            @else
                                <td><span class="badge badge-danger">InActive</span></td>
                            @endif

                            @if ($edit == 1)
                                <td><button class="btn btn-primary btn-sm edit" type="button"
                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                        data-number="{{ $item->number }}" data-email="{{ $item->email }}"
                                        data-gst="{{ $item->gst }}" data-address="{{ $item->address }}"
                                        data-state="{{ $item->state }}" data-city="{{ $item->city }}"
                                        data-pincode="{{ $item->pincode }}" data-active="{{ $item->active }}"
                                        data-dob="{{ $item->dob }}" data-pan_card="{{ $item->pan_card }}"
                                        data-adhar_card="{{ $item->adhar_card }}" data-city1="{{ $item->city1 }}"
                                        data-so_wo="{{ $item->so_wo }}" data-rating="{{ $item->rating }}"
                                        data-project="{{ $item->project }}" data-unit_no="{{ $item->unit_no }}"
                                        data-type="{{ $item->type }}"><i class="fa fa-pencil"
                                            aria-hidden="true"></i></button>
                                    <button type="button" data-id="{{ $item->id }}"
                                        class="btn btn-success btn-sm transaction" data-bs-toggle="modal" title="Add Transaction"
                                        data-bs-target="#exampleModal1">
                                     <i class="fa-solid fa-money-bill"></i>
                                    </button>
                                    <a title="View Transaction" class="btn btn-sm btn-info" href="{{ route('viewTransaction', $item->id) }}"><i class="fa-solid fa-money-bill"></i></a>

                                </td>
                            @endif


                        </tr>
                    @endforeach
                </tbody>

            </table>
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
                            <input type="text" class="form-control" name="ref_id" id="ref_id" placeholder="Add Reference"> 
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
    </script>
@endsection
