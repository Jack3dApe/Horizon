@extends('layouts.guests.base')
@section('title', 'Password Recovery')
@section('content')


    <section class="normal-breadcrumb" style="background-image: url('{{ asset('imgs/frontend/banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Password Recovery</h2>
                        <p>Welcome to Horizon</p>
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
                        <h3>Password Recovery</h3>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        <form action="{{ route('password.recovery') }}" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="text" name="email" placeholder="Email address" value="{{ old('email') }}">
                                <span>
                                    <i class="icon_mail"></i>
                                </span>
                            </div>
                            <button type="submit" class="site-btn">Request Password</button>
                        </form>
                        <a href="{{ route('login') }}" class="forget_pass">Cancel</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Don’t Have An Account?</h3>
                        <a href="{{ route('register') }}" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
