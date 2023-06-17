@extends('layouts.auth')

@section('content')
    <div class="login-register-bg">
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="lg-left">
                    <div class="lg-logo">
                        <a href="index.html"><img src="{{asset('images/login-register/logo.svg')}}" alt=""></a>
                    </div>
                    <div class="lr-text">
                        <h2>Register Now</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla interdum blandit felis a
                            hendrerit.</p>
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
                            <div class="rgstr-dt-txt">
                                By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Data Policy</a>
                                and <a href="#">Cookie Policy</a>. You may receive Email notifications from us and can
                                opt out at any time.
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
