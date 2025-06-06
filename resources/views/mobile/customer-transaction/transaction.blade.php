@extends('mobile.layouts.main')
@section('main-section')
<style>
    @media print 
    {
        .statics-b,
        .cust-report-h, .adminuiux-mobile-footer
        { 
            display: none !important;
        }
 
        body 
        {
            margin: 0;
        }
    }
</style>
    <div class="container-fluid py-3 px-3 mt-2">
        <div class="row statics-b">
            <div class="col-1">
                <a href="{{route('dashboard.view')}}"><i class="fa fa-arrow-left fs-3"></i></a>
            </div>
            <div class="col-11">
                <div class="row">
                    <div class="col-2">
                        <span class="text-dark bold rounded-circle border px-2 py-1">
                            {{ isset($customer->name) && !empty($customer->name) ? strtoupper(substr($customer->name, 0, 1)) : '' }}
                        </span>
                    </div>
                    <div class="col-8 mb-4">
                     <h4>{{ isset($customer) && isset($customer->name) ? $customer->name : '' }}</h4>
                        <p class="text-muted m-0 p-0" data-bs-toggle="modal" data-bs-target="#editCustomerModal" style="cursor: pointer;">
                            View Settings
                        </p>
                    </div>
                    <div class="col-2">
                        <a href="tel:+{{$customer->number}}"><i class="fa fa-phone"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5>You will @if ($finalAmount >= 0) give @else get @endif</h5>
                            </div>
                            <div class="col-4 text-end">
                                <h5 class="@if ($finalAmount >= 0) text-success @else text-danger @endif">₹ {{isset($finalAmount) && !empty($finalAmount) ? number_format(str_replace('-', '',$finalAmount), 2) : '0.00'}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mt-3">
           <div class="col-4">
                <span id="generateReport" style="cursor: pointer;">
                    <a href="{{ route('generate.report', ['id' => $customer->id]) }}" class="text-decoration-none">
                        <i class="fa fa-file"></i><br>Report
                    </a>
                </span>
            </div>
            <div class="col-4">
                @if(isset($customer->number))
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $customer->number) }}?text={{ urlencode('Hi ' . ($customer->name ?? '') . ', this is a reminder regarding your balance.') }}" target="_blank" style="color: inherit; text-decoration: none;">
                        <i class="fa-brands fa-whatsapp"></i><br>Reminder
                    </a>
                @else
                    <span><i class="fa-brands fa-whatsapp"></i><br>Reminder</span>
                @endif
            </div>

            <div class="col-4"><i class="fa-regular fa-message"></i><br>SMS</div>
        </div>

        
        <!-- <div id="transaction-report" class="bg-white"> -->
            
            <!-- <div class="only-pdf" style="margin-bottom: 20px;">
                <h3>Customer Report</h3>
                <p class="customer-name">{{ $customer->name ?? 'N/A' }}</p>
                <p class="customer-number">{{ $customer->number ?? 'N/A' }}</p>
                <p class="oldest-date">{{$oldestTransactionDate}}</p>
                <p class="latest-date">{{$latestTransactionDate}}</p>
                <p class="totalEntries">{{$totalEntries}}</p>
                <hr>
            </div> -->
            <!-- <div class="only-pdf" style="margin-bottom: 20px;">
                <h3>Customer Report</h3>
                <p><strong>Name:</strong> {{ $customer->name ?? 'N/A' }}</p>
                <p><strong>Phone:</strong> {{ $customer->number ?? 'N/A' }}</p>
                <hr>
            </div> -->
            @include('mobile.partials.transactions-list')
        <!-- </div> -->

        <footer class="adminuiux-mobile-footer hide-on-scrolldown style-1">
            <div class="container">
                <ul class="nav nav-pills nav-justified py-2">
                    <li class="nav-item">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#youGaveModal"><span class="nav-text">YOU GAVE ₹</span></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#youGotModal"><span class="nav-text">YOU GOT ₹</span></button>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    @include('mobile/modals/gave-money-modal')
    @include('mobile/modals/got-money-modal')
    @include('mobile/modals/edit-customer-modal')
@endsection