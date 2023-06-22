@extends('layouts.auth')

@section('content')
    <div class="login-register-bg">
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="lg-left">
                    <div class="lg-logo">
                        <a href="index.html"><img src="{{asset('/assets/images/login-register/logo.svg')}}" alt="Logo"></a>
                    </div>
                    <div class="lr-text">
                        <h2>Verify email</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum blandit felis a
                            hendrerit.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="lr-right">
                    <div class="login-register-form">
                        <form method="POST" action="{{route('verification.send')}}">
                            @csrf
                            <button class="login-btn" type="submit">Resend Verification Link</button>
                        </form>
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                        <div class="regstr-link">Don’t have an account? <a href="{{ route('register') }}">Register
                                Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
