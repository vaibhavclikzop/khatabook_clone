<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
        <meta name="application-name" content="{{ $setting->company_name ?? 'Company Name' }}"/>
        <meta name="apple-mobile-web-app-title" content="{{ $setting->company_name ?? 'Company Name' }}"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="white"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Testing</title>
        <meta name="description" content="{{ $setting->company_name ?? 'Company Name' }}">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&amp;family=SUSE:wght@100..800&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
        :root
            {
                --adminuiux-content-font:"Open Sans",sans-serif;--adminuiux-content-font-weight:400;--adminuiux-title-font:"SUSE",sans-serif;--adminuiux-title-font-weight:600
            }
        </style>
        <script defer src="{{ asset('mobile/js/appf541.js') }}"></script>
        <link href="{{ asset('mobile/css/appf541.css') }}" rel="stylesheet">
    </head>
    <body class="main-bg main-bg-opac roundedui adminuiux-header-standard adminuiux-sidebar-standard theme-orange adminuiux-header-transparent adminuiux-sidebar-fill-theme bg-white scrollup" data-theme="theme-orange" data-sidebarfill="adminuiux-sidebar-fill-theme" data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" tabindex="0" data-sidebarlayout="adminuiux-sidebar-standard" data-headerlayout="adminuiux-header-standard" data-headerfill="adminuiux-header-transparent">
        <div class="pageloader">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center text-center h-100 pb-ios">
                    <div class="col-12 mb-auto pt-4"></div>
                        <div class="col-auto">
                            <img src="assets/img/logo.svg" alt="" class="height-80 mb-3">
                            <p class="h2 mb-0 text-theme-accent-1">{{ $setting->company_name ?? 'Company Name' }}</p>
                            <div class="loader3 mb-2 mx-auto"></div>
                        </div>
                        <div class="col-12 mt-auto pb-4">
                            <p class="small text-secondary">Please wait we are preparing awesome things...</p>
                        </div>
                    </div>
                </div>
            </div>
            <main class="flex-shrink-0 pt-0 position-relative h-100">
                <div class="container-fluid z-index-1 position-relative">
                    <div class="auth-wrapper d-flex flex-column minvheight-100">
                        <div class="row gx-3 align-items-center justify-content-center py-3">
                            <div class="col-11 col-sm-8 col-md-11 col-xl-11 col-xxl-10 login-box">
                               <div class="mb-4">
                                    <img src="{{ asset('assets/img/logo.svg') }}" class="width-50 mx-auto mb-3" alt=""><br>
                                    <h2 class="text-theme-accent-1 mb-0">Welcome to</h2>
                                    <h1 class="fw-bold text-theme-1">
                                        {{ $setting->company_name ?? 'Company Name' }}
                                    </h1>
                                </div>
                                <form action="{{ route('user.login') }}" method="POST">
                                @csrf
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="emailadd" placeholder="Enter email address" value="info@adminuiux" autofocus=""> 
                                        <label for="emailadd">Email Address</label>
                                    </div>
                                    <div class="position-relative">
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control" id="passwd" placeholder="Enter your password"> 
                                            <label for="passwd">Password</label>
                                        </div>
                                        <button class="btn btn-square btn-link text-theme-1 position-absolute end-0 top-0 mt-2 me-2">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="row gx-3 align-items-center mb-3">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme"> 
                                                <label class="form-check-label" for="rememberme">Remember me</label>
                                            </div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <a href="Testing-forgot-password.html" class="">Forget Password?</a>
                                        </div> -->
                                    </div>
                                   <button type="submit" class="btn btn-lg btn-theme w-100 mb-4"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                                </form>
                                <footer class="adminuiux-footer mt-auto position-fixed bottom-0">
                                    <div class="container-fluid text-center">
                                        <span class="small">Copyright @2025, <a href="https://adminuiux.com/" target="_blank">{{ $setting->company_name ?? 'Company Name' }}</span>
                                    </div>
                                </footer>                               
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="{{asset('mobile/inner-js/script.auth.js')}}"></script>
    </body>
</html>