@extends('mobile.layouts.main')
@section('main-section')
    <div class="pageloader">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center text-center h-100 pb-ios">
                <div class="col-auto"><img src="assets/img/logo.svg" alt="" class="height-80 mb-3">
                    <p class="h2 mb-0 text-theme-accent-1">{{ $setting->company_name ?? 'Company Name' }}</p>
                    <div class="loader3 mb-2 mx-auto"></div>
                </div>
                <div class="col-12 mt-auto pb-4">
                    <p class="small text-secondary">Please wait while we prepare everything for you...</p>
                </div>
            </div>
        </div>
    </div>

    <div class="adminuiux-wrap">
        <main class="adminuiux-content has-sidebar" onclick="contentClick()">
            <div class="container mt-1" id="main-content">
                <div class="row gx-3 align-items-center">
                    <div class="col-9 col-sm-12 col-md-9 col-xl p-4">
                        <h5 class="fw-bold text-theme-accent-1 mb-0 d-flex gap-3 align-items-center">
                            <i class="fa fa-book"></i><span>
                                @php
                                    $output = isset($user) && !empty($user) ? $user : 'My business';
                                @endphp
                                {{ $output }}
                            </span>
                            <i class="fa fa-pencil" data-bs-toggle="modal" data-bs-target="#businessModal"></i>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="container mt-3 statics-b">
                <div class="row">
                    <div class="col-6 col-lg-4 col-xl-auto ms-xl-auto">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body">
                                <h6 class="mb-0">You will give</h6>
                                <p class="small text-success">₹
                                    {{ number_format($totalTakeQuery) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-xl-auto">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body">
                                <h6 class="mb-0">You will get</h6>
                                <p class="small text-danger">- ₹ @if ($totalGiveQuery)
                                        {{ number_format(str_replace('-', '', $totalGiveQuery), 2) }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($rolePermissions as $item)
            @if ($item->permission_id == 2 && $item->view == 1)
            @include('mobile/partials/customer-list')

            @endif
            @endforeach
            @include('mobile/partials/profile-section')
        </main>
    </div>

    <footer class="adminuiux-mobile-footer hide-on-scrolldown style-1">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link gap-3 active" id="partiesTab" href="#">
                        <span>
                            <i class="fa fa-users"></i>
                            <span class="nav-text">Parties</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gap-3" id="logout" href="{{ route('Logout') }}">
                        <i class="fa-solid fa-sign-out"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>

    @foreach ($rolePermissions as $item)
        @if ($item->permission_id == 2 && $item->view == 1)
            <button class="btn btn-accent btn-lg btn-danger rounded-pill shadow position-fixed"
                style="bottom: 70px; right: 20px; z-index: 999; font-size:14px;" data-bs-toggle="modal"
                data-bs-target="#addCustomerModal">
                <i class="fa fa-user-plus"></i> <span> ADD CUSTOMER/SUPPLIER</span>
            </button>
        @endif
    @endforeach
    <div class="pagination-container">
        {{ $customers_info->links() }}
    </div>
    @include('mobile/modals/customer-modal')
    @include('mobile/modals/business-modal')
@endsection
