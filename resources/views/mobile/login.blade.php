<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
        <meta name="application-name" content="Testing UI UX"/>
        <meta name="apple-mobile-web-app-title" content="Testing UI UX"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="white"/>
        <link rel="apple-touch-icon" href="assets/img/logo-512.png"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Testing</title>
        <meta name="description" content="Testing App HTML Templates | Bootstrap 5 | UI/UX | Mobile | Admin | Dashboard | Universal App | Build stunning Testing apps with our premium templates.">
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
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
                            <p class="h2 mb-0 text-theme-accent-1">Customer UI/UX</p>
                            <p class="display-3 text-theme-1 fw-bold mb-4">Testing</p>
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
                                    <img src="assets/img/logo.svg" class="width-50 mx-auto mb-3" alt=""><br>
                                    <h2 class="text-theme-accent-1 mb-0">Welcome to</h2>
                                    <h1 class="fw-bold text-theme-1">Dummy<b>UI/UX</b>
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
                                        <div class="col-auto">
                                            <a href="Testing-forgot-password.html" class="">Forget Password?</a>
                                        </div>
                                    </div>
                                   <button type="submit" class="btn btn-lg btn-theme w-100 mb-4"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                                </form>
                                <div class="small text-secondary text-center mb-4">Don't have account? 
                                    <a href="Testing-signup.html" class="">Create Account</a>
                                </div>
                                <div class="row gx-3 align-items-center mb-2">
                                    <div class="col">
                                        <hr class="">
                                    </div>
                                    <div class="col-auto">
                                        <p class="small text-secondary">OR Continue with</p>
                                    </div>
                                    <div class="col">
                                        <hr class="">
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col">
                                        <button class="btn btn-link w-100 mb-3 text-start">
                                            <img src="assets/img/g-logo.png" alt="" class="avatar avatar-20 me-2 align-middle">Google</button>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-link w-100 mb-3 text-start">
                                                <img src="assets/img/f-logo.png" alt="" class="avatar avatar-20 me-2 align-middle">Facebook</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanvas offcanvas-end shadow border-0 maxwidth-300" tabindex="-1" id="theming" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="theminglabel">
                                    <div class="offcanvas-header border-bottom"><div>
                                        <h5 class="offcanvas-title" id="theminglabel">Personalize</h5>
                                        <p class="text-secondary small">Make it more like your own</p>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <h6 class="offcanvas-title">Colors</h6>
                                    <p class="text-secondary small mb-4">Change colors of templates</p>
                                    <div class="row gx-3 mb-3 theme-select">
                                        <div class="col-auto">
                                            <div class="select-box text-center mb-2" data-title="">
                                                <span class="avatar avatar-40 rounded-circle mb-2 bg-default">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="select-box text-center mb-2" data-title="theme-blue">
                                                <span class="avatar avatar-40 rounded-circle mb-2 bg-blue"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="select-box text-center mb-2" data-title="theme-indigo">
                                                <span class="avatar avatar-40 rounded-circle mb-2 bg-indigo"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="select-box text-center mb-2" data-title="theme-purple">
                                                <span class="avatar avatar-40 rounded-circle mb-2 bg-purple"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="select-box text-center mb-2" data-title="theme-pink">
                                                <span class="avatar avatar-40 rounded-circle mb-2 bg-pink">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="select-box text-center mb-2" data-title="theme-red">
                                                <span class="avatar avatar-40 rounded-circle mb-2 bg-red"></span>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="select-box text-center mb-2" data-title="theme-orange">
                                                <span class="avatar avatar-40 rounded-circle mb-2 bg-orange"></span></div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-yellow">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-yellow"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-green">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-green"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-teal">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-teal"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-cyan">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-cyan"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-grey">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-grey"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-brown">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-brown"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-chocolate">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-chocolate"></span>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="select-box text-center mb-2" data-title="theme-black">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-dark"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="offcanvas-title">Backgrounds</h6>
                                        <p class="text-secondary small mb-4">Change color for background</p>
                                        <div class="row gx-3 mb-3 theme-background">
                                            <div class="col-auto">
                                                <div class="gradient-box text-center mb-2" data-title="bg-default">
                                                    <span class="avatar avatar-40 rounded-circle mb-2 bg-default">
                                                        <i class="bi bi-arrow-clockwise"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-white">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-white"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-r-gradient">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-r-gradient"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-1">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-1"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-2">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-2"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-3">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-3">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-4">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-4"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-5">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-5"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-6">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-6"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-7">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-7"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-8">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-8"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-9">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-9"></span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="gradient-box text-center mb-2" data-title="bg-gradient-10">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-gradient-10"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="offcanvas-title">Sidebar Layout</h6>
                                            <p class="text-secondary small mb-4">Change sidebar layout style</p>
                                            <div class="row gx-3 mb-3 sidebar-layout">
                                                <div class="col-auto">
                                                    <div class="select-box text-center mb-2" data-title="adminuiux-sidebar-standard" data-bs-toggle="tooltip" title="None">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-default">
                                                            <i class="bi bi-arrow-clockwise"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="select-box text-center mb-2" data-title="adminuiux-sidebar-iconic" data-bs-toggle="tooltip" title="Iconic">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-default">
                                                            <i class="bi bi-bezier h4"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="select-box text-center mb-2" data-title="adminuiux-sidebar-boxed" data-bs-toggle="tooltip" title="Boxed">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-default"><i class="bi bi-box h5"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="select-box text-center mb-2" data-title="adminuiux-sidebar-boxed adminuiux-sidebar-iconic" data-bs-toggle="tooltip" title="Iconic+Boxed">
                                                        <span class="avatar avatar-40 rounded-circle mb-2 bg-default">
                                                            <i class="bi bi-bounding-box h5"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-3">
                                                <a href="Testing-personalization.html" class="btn btn-sm btn-outline-theme">More options <i class="bi bi-arrow-right-short"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="adminuiux-footer mt-auto">
                                        <div class="container-fluid text-center">
                                            <span class="small">Copyright @2025, <a href="https://adminuiux.com/" target="_blank">Testing UI UX</a> on Earth ❤️</span>
                                        </div>
                                    </footer>
                                    <div class="position-fixed bottom-0 end-0 m-3 z-index-5" id="fixedbuttons">
                                        <button class="btn btn-square btn-theme shadow rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#theming" aria-controls="theming">
                                            <i class="bi bi-palette"></i>
                                    </button><br>
                                    <button class="btn btn-theme btn-square shadow mt-2 d-none rounded-circle" id="backtotop"><i class="bi bi-arrow-up"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="{{asset('mobile/inner-js/script.auth.js')}}"></script>
    </body>
</html>