@extends('layouts.auth')

@section('content')
    <div class="login-register-bg">
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="lg-left">
                    <div class="lg-logo">
                        <a class="order-lg-0 ml-lg-0 ml-3 me-auto d-flex align-items-center" href="{{route('user.events.index')}}"><img
                                src="{{asset('/assets/images/logo-2.svg')}}" alt=""><span class="text-uppercase fs-5 ms-3" style="color: #ff7555">SparkMeet</span></a>
                    </div>
                    <div class="lr-text">
                        <h2>Login Now</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lr-right">
                    <div class="login-register-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-input h_50 @error('email') is-invalid @enderror"
                                       type="email" placeholder="{{__('Type email')}}" name="email"
                                       value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-input h_50 @error('password') is-invalid @enderror"
                                       type="password" placeholder="{{__('Password')}}" name="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="login-btn" type="submit">Login Now</button>
                        </form>
{{--                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>--}}
                        <div class="regstr-link">Don’t have an account? <a href="{{ route('register') }}">Register
                                Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
