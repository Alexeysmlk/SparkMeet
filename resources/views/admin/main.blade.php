<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="{{asset('/assets/images/fav.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SparkMeet') }}</title>


    <!-- Styles from main -->
    <link href="{{asset('/assets/css/admin/style.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/admin/mystyle.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/datepicker.min.css')}}" rel="stylesheet">
{{--    <link href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('/assets/vendor/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">



    <link rel="stylesheet" href="{{asset('/assets/vendor/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/vertical-layout-light/style.css')}}">
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}"/>



</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset('/assets/images/logo.svg')}}"
                                                                           class="mr-2 ml-4"
                                                                           alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('/assets/images/logo-2.svg')}}"
                                                                           alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        @if($profile->photo_url)
                            <img
                                src="{{ asset('/storage/' . $profile->photo_url) }}"
                                alt="Photo of profile">
                        @else
                            <img
                                src="{{ asset('/assets/images/find-peoples/default-avatar-profile.jpg') }}"
                                alt="Photo of profile">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="ti-power-off text-primary"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>
                    Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                    Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard.main')}}">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.user.index')}}">
                        <i class="icon-head menu-icon"></i>
                        <span class="menu-title">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.events.index')}}">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">Events</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.categories.index')}}">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Categories</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.tags.index')}}">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Tags</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a
                            href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                            class="ti-heart text-danger ml-1"></i></span>
                </div>
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                            href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('/assets/vendor/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('/assets/vendor/chart.js/Chart.min.js')}}"></script>
{{--<script src="/assets/vendor/datatables.net/jquery.dataTables.js"></script>--}}
{{--<script src="/assets/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>--}}
{{--<script src="/assets/js/dataTables.select.min.js"></script>--}}


<!-- MyScript from main -->
<script src="{{asset('/assets/js/myScript.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script src="{{asset('/assets/js/datepicker.min.js')}}"></script>
<script src="{{asset('/assets/js/i18n/datepicker.en.js')}}"></script>
<script src="{{asset('/assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<!-- MyScript from main end-->


<script src="{{asset('/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('/assets/js/template.js')}}"></script>
<script src="{{asset('/assets/js/settings.js')}}"></script>
<script src="{{asset('/assets/js/todolist.js')}}"></script>

<script src="{{asset('/assets/js/dashboard.js')}}"></script>
</body>

</html>

