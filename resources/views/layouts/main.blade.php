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
    <link rel="icon" type="image/png" href="{{asset('/assets/images/fav.png')}}">

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
<!-- Header Start -->
<header>
    <nav class="navbar navbar-expand-lg custom-navbar bg-dark1 justify-content-sm-start">
        <div class="container">
            <button class="navbar-toggler align-self-start" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
						<span class="custom-toggler-icon">
							<i class="feather-menu"></i>
						</span>
            </button>
            <a class="order-lg-0 ml-lg-0 ml-3 me-auto d-flex align-items-center" href="{{route('user.events.index')}}"><img
                    src="{{asset('/assets/images/logo-2.svg')}}" alt=""><span class="text-uppercase fs-5 ms-3" style="color: #ff7555">SparkMeet</span></a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                 aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <div class="offcanvas-logo" id="offcanvasNavbarLabel">
                        <img src="{{asset('/assets/images/logo.svg')}}" alt="">
                    </div>
                    <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="feather-x"></i>
                    </button>
                </div>
                <div class="offcanvas-body">

                    <a href="#" class="add-event-btn btn-hover d-block d-lg-none">Add New Event</a>
{{--                    <ul class="navbar-nav justify-content-end flex-grow-1 pe_5">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" aria-current="page" href="index.html">--}}
{{--										<span class="nav-icon d-lg-none me-3">--}}
{{--											<i class="feather-home"></i>--}}
{{--										</span>--}}
{{--                                Home--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="explore.html">--}}
{{--										<span class="nav-icon  d-lg-none me-3">--}}
{{--											<i class="feather-target"></i>--}}
{{--										</span>--}}
{{--                                Explore--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="discussions.html">--}}
{{--										<span class="nav-icon d-lg-none me-3">--}}
{{--											<i class="feather-message-circle"></i>--}}
{{--										</span>--}}
{{--                                Discussion--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="our_blog.html">--}}
{{--										<span class="nav-icon d-lg-none me-3">--}}
{{--											<i class="feather-rss"></i>--}}
{{--										</span>--}}
{{--                                Blog--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </div>
            </div>
            <div class="account dropdown">
                <a href="#" class="account-link dropdown-toggle-no-caret" id="dropdownMenuClickableInside"
                   data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <div class="user-dp">
                        @if($profile->photo_url)
                            <img
                                src="{{ asset('/storage/' . $profile->photo_url) }}"
                                alt="Photo of profile">
                        @else
                            <img
                                src="{{ asset('/assets/images/find-peoples/default-avatar-profile.jpg') }}"
                                alt="Photo of profile">
                        @endif
                    </div>
                    <i class="feather-chevron-down ms-2"></i>
                </a>
                <div class="dropdown-menu dropdown-account dropdown-menu-end"
                     aria-labelledby="dropdownMenuClickableInside">
                    <a class="link-item" href="{{route('user.profile.index')}}"><i class="feather-user me-3"></i>Profile</a>
{{--                    <a class="link-item" href="saved.html"><i class="feather-heart me-3"></i>Save items</a>--}}
                    <a class="link-item" href="{{route('user.profile.edit')}}"><i class="feather-settings me-3"></i>Setting</a>
                    <a class="link-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                            class="feather-log-out me-3"></i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->
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
                        <li><a href="{{route('privacy')}}">Privacy</a></li>
                        <li><a href="{{route('terms-conditions')}}">Term and Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="footer-right">
                    <ul class="copyright-text">
                        <li><a href="index.html"><img src="{{asset('/assets/images/logo-2.svg')}}" alt=""></a></li>
                        <li>
                            <div class="ftr-1"><i class="far fa-copyright"></i> 2023 Samoilik Aleksey
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
