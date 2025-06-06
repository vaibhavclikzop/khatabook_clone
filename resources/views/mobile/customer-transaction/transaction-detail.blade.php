@extends('mobile.layouts.main')
@section('main-section')
    <div class="container-fluid py-3 px-3 mt-2">
        <div class="row statics-b">
            <div class="col-1">
                <a href="{{ route('view.transaction', ['id' => $customer_id]) }}"><i class="fa fa-arrow-left fs-3"></i></a>
            </div>
            <div class="col-11">
                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-4">Entry Details</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="rounded-circle me-3 d-flex gap-3">
                                    <span class="text-dark bold rounded-circle border px-2 py-1">{{ strtoupper(substr($customer->name, 0,1));}}</span>
                                    <h6>{{$customer->name}}</h6>
                                </div>
                                <p class="mb-1 ms-5 text-muted">{{$transaction->formatted_date = \Carbon\Carbon::parse($transaction->transaction_date)->format('d M y - h:ia');}}</p> 
                            </div>
                            <div class="col-4">
                                <h5 class="{{ isset($transaction->type) && $transaction->type == 'give' ? 'text-danger' : ' text-success' }} text-end">{{ isset($transaction->type) && $transaction->type == 'give' ? '-' : '' }} ₹ {{isset($transaction->amount) && !empty($transaction->amount) ? $transaction->amount : '0.00'}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 border-top">
                    <div class="edit">
                        <button type="button" class="btn text-primary d-flex align-items-center justify-content-center gap-2 mx-auto mt-2" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa fa-pencil"></i> EDIT ENTRY
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 gap-4">
                <i class="fa fa-message me-2"></i> SMS disabled
            </div>
            <div class="col-12 mt-3">
                <p class="text-muted m-0 p-0">You gave $ {{isset($transaction->amount) && !empty($transaction->amount) ? $transaction->amount : '0.00'}}</p>
                <p class="text-muted m-0 p-0">Balance: +($ {{isset($transaction->amount) && !empty($transaction->amount) ? $transaction->amount : '0.00'}})</p>
                <p class="text-muted m-0 p-0">Sent by: ({{$customer->number}})</p>
            </div>
        </div>

        <footer class="adminuiux-mobile-footer hide-on-scrolldown style-1">
            <div class="container">
                <ul class="nav nav-pills nav-justified py-2">
                    <li class="nav-item">
                        <button type="button" class="btn btn-danger" id="deleteBtn"><i class="fa fa-trash"></i><span class="nav-text">Delete</span></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#youGotModal"><i class='fa fa-share'></i><span class="nav-text">Share</span></button>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    @include('mobile/modals/edit-entry-modal')
@endsection