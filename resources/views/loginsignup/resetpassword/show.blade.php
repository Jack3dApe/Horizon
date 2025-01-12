@extends('layouts.guests.base')
@section('title', 'Reset Password')
@section('content')

    <section class="normal-breadcrumb" style="background-image: url('{{ asset('imgs/frontend/banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Reset Password</h2>
                        <p>Enter your new password</p>
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
                        <h3>Reset Password</h3>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input__item">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email address" class="@error('email') is-invalid @enderror">
                                <span><i class="icon_mail"></i></span>
                                @error('email')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input__item">
                                <input type="password" name="password" placeholder="New Password" class="@error('password') is-invalid @enderror">
                                <span class="icon_lock"></span>
                                @error('password')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input__item">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                                <span class="icon_lock"></span>
                            </div>

                            <button type="submit" class="site-btn">Reset Password</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Welcome Back</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
