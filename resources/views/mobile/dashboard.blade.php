@extends('mobile.layouts.main')
@section('main-section')
    <div class="pageloader">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center text-center h-100 pb-ios">
                <div class="col-12 mb-auto pt-4"></div>
                <div class="col-auto"><img src="assets/img/logo.svg" alt="" class="height-80 mb-3">
                    <p class="h2 mb-0 text-theme-accent-1">AdminUIUX</p>
                    <p class="display-3 text-theme-1 fw-bold mb-4">Fitness</p>
                    <div class="loader3 mb-2 mx-auto"></div>
                </div>
                <div class="col-12 mt-auto pb-4">
                    <p class="small text-secondary">Please wait while we prepare everything for you...</p>
                </div>
            </div>
        </div>
    </div>

    <header class="adminuiux-header">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="btn btn-link btn-square sidebar-toggler" type="button" onclick="initSidebar()">
                    <i class="sidebar-svg" data-feather="menu"></i>
                </button>
                <div class="ms-auto">
                    <button class="btn btn-link btn-square btn-icon btn-link-header d-lg-none" type="button" onclick="openSearch()">
                        <i data-feather="search"></i>
                    </button>
                    <button class="btn btn-link btn-square btnsunmoon btn-link-header" id="btn-layout-modes-dark-page"><i class="sun mx-auto" data-feather="sun"></i> 
                        <i class="moon mx-auto" data-feather="moon"></i>
                    </button>
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-link btn-square btn-icon btn-link-header dropdown-toggle no-caret" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="bell"></i> <span class="position-absolute top-0 end-0 badge rounded-pill bg-danger p-1"><small>9+</small> <span class="visually-hidden">unread messages</span></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end notification-dd">
                            <li>
                                <a class="dropdown-item p-2" href="#">
                                    <div class="row gx-3">
                                        <div class="col-auto">
                                            <figure class="avatar avatar-40 rounded-circle bg-pink">
                                                <i class="fa fa-user text-light"></i></figure>
                                        </div>
                                        <div class="col">
                                            <p class="mb-2 small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa voluptatem aspernatur possimus debitis minus non architecto doloribus dolores consectetur nesciunt eaque dignissimos, vero unde distinctio vel ipsa exercitationem illo ea. <span class="fw-bold">#H10215</span> has reached 1000 views.</p><span class="row"><span class="col"><span class="badge badge-light rounded-pill text-bg-warning small">Directory</span></span>
                                            <span class="col-auto small opacity-75">1:00 am</span></span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="text-center">
                                <button class="btn btn-link text-center" onclick="notifcationAll()">View all <i class="bi bi-arrow-right fs-14"></i></button>
                            </li>
                            <li><a class="btn btn-sm btn-link theme-green" href="https://1.envato.market/qzgZ9y" target="_blank"><i data-feather="shopping-bag" class="avatar avatar-18 me-1"></i> Buy Now</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="adminuiux-search-full">
            <div class="row gx-2 align-items-center">
                <div class="col-auto">
                    <button class="btn btn-link btn-square" type="button" onclick="closeSearch()"><i data-feather="arrow-left"></i></button>
                </div>
                <div class="col">
                    <input class="form-control pe-0 border-0" type="search" placeholder="Type something here...">
                </div>
            </div>
        </div>
    </header>

    <div class="adminuiux-wrap">
        <div class="adminuiux-sidebar shadow-sm">
            <div class="adminuiux-sidebar-inner">
                <ul class="nav flex-column menu-active-line mt-3">
                    <li class="nav-item">
                        <a href="fitness-dashboard.html" class="nav-link gap-3">
                            <i class="fa fa-dashboard"></i> <span class="menu-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascrit:void(0)" class="nav-link dropdown-toggle gap-3" data-bs-toggle="dropdown">
                            <i class="fa fa-user"></i> <span class="menu-name">Customer</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="nav-item">
                                <a href="fitness-club-all.html" class="nav-link gap-3">
                                    <i class="fa fa-add"></i> <span class="menu-name">Add Customer</span>
                                </a>
                            </div>
                            <div class="nav-item">
                                <a href="fitness-club.html" class="nav-link gap-3">
                                    <i class="fa fa-eye"></i> <span class="menu-name">View Customers</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="mt-auto"></div>
                <ul class="nav flex-column menu-active-line mb-2">
                    <li class="nav-item">
                        <a href="{{ route('Logout') }}" class="nav-link">
                            <div class="col-auto">
                                <div class="avatar avatar-30 coverimg rounded d-block align-top">
                                    <img src="assets/img/modern-ai-image/user-5.jpg" alt="">
                                </div>
                            </div>
                            <div class="col px-2 menu-name text-start not-iconic">
                                <p class="mb-0 fs-14 lh-20">Admin
                                    <br><small class="opacity-50">Logout</small>
                                </p>
                            </div>
                            <div class="col-auto not-iconic">
                                <i class="fa fa-sign-out"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <main class="adminuiux-content has-sidebar" onclick="contentClick()">
            <div class="container mt-1" id="main-content">
                <div class="row gx-3 align-items-center">
                    <div class="col-auto mb-4">
                        <figure class="avatar avatar-60 rounded-circle coverimg align-middle"><img src="assets/img/fitness/image-6.jpg" alt=""></figure>
                    </div>
                    <div class="col-9 col-sm-12 col-md-9 col-xl mb-4">
                        <h4 class="fw-bold text-theme-accent-1 mb-0 d-flex gap-4 align-items-center">
                            <i class="fa fa-book"></i><span> My Business</span>
                            <i class="fa fa-pencil"></i>
                        </h4>
                    </div>
                    <div class="col-6 col-lg-4 col-xl-auto ms-xl-auto">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body">
                                <h6 class="mb-0">You will give</h6>
                                <p class="small text-success">$ 0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-xl-auto">
                        <div class="card adminuiux-card mb-3">
                            <div class="card-body">
                                <h6 class="mb-0">You will get</h6>
                                <p class="small text-danger">$ 0</p>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12 col-lg-4 col-xl-3">
                        <div class="card adminuiux-card border-0 bg-theme-r-gradient mb-3">
                            <div class="card-body">
                                <div class="row gx-3 align-items-center">
                                    <div class="col mb-0 mb-lg-2">
                                        <h6>Add Customer</h6>
                                    </div>
                                    <div class="col-auto col-lg-12">
                                        <button class="btn btn-accent btn-square">
                                            <i class="fa fa-add"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12">
                        <div class="card adminuiux-card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Customer List</h5>
                                <button class="btn btn-sm btn-link" onclick="refreshCustomerList()">
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </div>
                            <div class="card-body p-0">
                                <div class="p-3 border-bottom">
                                    <div class="input-group">
                                        <span class="input-group-text bg-transparent border-end-0">
                                            <i class="fa fa-search"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" placeholder="Search customers..." 
                                        id="customerSearch" onkeyup="searchCustomers()">
                                    </div>
                                </div>
                                <div class="list-group list-group-flush" id="customerListContainer">
                                    <a href="#" class="list-group-item list-group-item-action p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-50 rounded-circle coverimg me-3">
                                                <img src="assets/img/modern-ai-image/user-1.jpg" alt="Customer">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">John Doe</h6>
                                                <small class="text-muted">+1 234 567 890</small>
                                            </div>
                                            <div class="badge bg-success rounded-pill">$ 80</div>
                                        </div>
                                    </a>                                
                                </div>
                                <div class="p-3 border-top">
                                    <nav aria-label="Customer pagination">
                                        <ul class="pagination pagination-sm justify-content-center mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <footer class="adminuiux-mobile-footer hide-on-scrolldown style-1">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item">
                    <a class="nav-link gap-3" href="">
                        <span>
                            <i class="fa fa-users">
                            </i> <span class="nav-text">Parties</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gap-3" href="fitness-workout.html"><span>
                        <i class="fa fa-money-bill"></i><span class="nav-text">Bills</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="fitness-diet.html" class="nav-link gap-3">
                        <i class="fa fa-box-open"></i><span class="nav-text">Items</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link gap-3" href="fitness-profile.html">
                        <i class="fa-solid fa-user"></i><span class="nav-text">Profile</span>
                    </a>
                </li>
            </ul>
        </div>
    </footer>

    <a href="fitness-club-all.html" class="btn btn-accent btn-lg btn-danger rounded-pill shadow position-fixed"
    style="bottom: 140px; right: 20px; z-index: 999; font-size:14px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-user-plus"></i> <span> ADD CUSTOMER</span>
    </a>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header gap-3">
                    <i class="fa-solid fa-arrow-left" data-bs-dismiss="modal" aria-label="Close"></i>
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Party</h1>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="party_name" placeholder="Party name">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="number" name="number" placeholder="Mobile Number">
                        </div>
                        <div class="mb-3 form-check m-0 p-0 d-flex gap-2">
                            <label for="">Who are they?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                <label class="form-check-label" for="inlineRadio1">Customer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Supplier</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer position-fixed bottom-0 w-100 gap-4">
                        <button type="button" class="btn btn-primary form-control">ADD CUSTOMER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


