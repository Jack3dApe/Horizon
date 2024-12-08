@extends('layouts.guests.base')
@section('title', 'Login')
@section('content')

    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Login</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Login</h3>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="text" name="email" placeholder="Email address" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                                <span class="icon_mail"></span>
                                @error('email')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="password" name="password" placeholder="Password" class="@error('password') is-invalid @enderror">
                                <span class="icon_lock"></span>
                                @error('password')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        @if($errors->has('error'))
                            <p style="color: red;">{{ $errors->first('error') }}</p>
                        @endif
                        <a href="#" class="forget_pass">Forgot Your Password?</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Don’t Have An Account?</h3>
                        <a href="{{ route('register') }}" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
