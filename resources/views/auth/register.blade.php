@extends('layouts.auth')

@section('content')
    <div class="login-register-bg">
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="lg-left">
                    <div class="lg-logo">
                        <a class="order-lg-0 ml-lg-0 ml-3 me-auto d-flex align-items-center" href="{{route('user.events.index')}}"><img
                                src="{{asset('/assets/images/logo-2.svg')}}" alt=""><span class="text-uppercase fs-5 ms-3" style="color: #ff7555">SparkMeet</span></a>                    </div>
                    <div class="lr-text">
                        <h2>Register Now</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lr-right">
                    <h4>Sign Up to Goeveni</h4>
                    <div class="login-register-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input class="form-input h_50 @error('email') is-invalid @enderror" type="email"
                                       placeholder="Email Address" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-input h_50 @error('password') is-invalid @enderror" type="password"
                                       placeholder="Password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input class="form-input h_50" type="password"
                                       placeholder="Confirm password" name="password_confirmation">
                            </div>
                            <button class="login-btn" type="submit">Register Now</button>
                            <div class="login-link">If you have an account? <a href="{{route('login')}}">Login Now</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
