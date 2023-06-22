<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SparkMeet') }}</title>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{asset('assets/images/fav.png')}}">

    <!-- Stylesheets -->
    <link href="{{asset('/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/myStyle.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/datepicker.min.css')}}" rel="stylesheet">

    <!-- Vendor Stylesheets -->
    <link href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/feather-icons/feather.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/OwlCarousel/assets/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/OwlCarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
<!-- Body Start -->
@yield('content')
<!-- Body End -->
<!-- Footer Start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="footer-left">
                    <ul>
                        <li><a href="privacy_policy.html">Privacy</a></li>
                        <li><a href="term_conditions.html">Term and Conditions</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact_us.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="footer-right">
                    <ul class="copyright-text">
                        <li><a href="index.html"><img src="{{asset('/assets/images/logo-2.svg')}}" alt=""></a></li>
                        <li>
                            <div class="ftr-1"><i class="far fa-copyright"></i> 2022 Goeveni by <a
                                    href="https://themeforest.net/user/gambolthemes">Gambolthemes</a>. All Rights
                                Reserved.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
<!-- Scripts js -->
<script src="{{asset('/assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('/assets/vendor/OwlCarousel/owl.carousel.js')}}"></script>
<script src="{{asset('/assets/js/datepicker.min.js')}}"></script>
<script src="{{asset('/assets/js/i18n/datepicker.en.js')}}"></script>
<script src="{{asset('/assets/js/custom.js')}}"></script>
<script src="{{asset('/assets/js/myScript.js')}}"></script>

</body>

</html>
