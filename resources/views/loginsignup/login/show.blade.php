@extends('layouts.guests.base')
@section('title', 'Login')
@section('content')


    <section class="normal-breadcrumb" style="background-image: url('{{ asset('imgs/frontend/banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>{{__('messages.login')}}</h2>
                        <p>{{__('messages.welcome')}}</p>
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
                        <h3>{{__('messages.login')}}</h3>

                        <!-- Mensagens gerais de erro -->
                        @if($errors->any())
                            <div class="alert alert-danger mb-4" style="padding: 10px;">
                                <ul class="mb-0" style="list-style-type: disc; padding-left: 20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="text" name="email" placeholder="{{__('messages.emailplaceholder')}}" value="{{ old('email') }}">
                                <span>
                                    <i class="icon_mail"></i>
                                </span>
                            </div>
                            <div class="input__item">
                                <input type="password" name="password" placeholder="{{__('messages.passwordplaceholder')}}">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">{{__('messages.loginnow')}}</button>
                        </form>

                        <a href="{{ route('password.request') }}" class="forget_pass">{{__('messages.forgotpassword')}}</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>{{__('messages.noaccount')}}</h3>
                        <a href="{{ route('register') }}" class="primary-btn">{{__('messages.registernow')}}</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="{{ route('auth.github') }}" class="github" style="background-color: rgb(75 85 99)"><i class="fa fa-github"></i> Sign in with GitHub</a></li>
                                <li><a href="{{ route('google.redirect') }}" class="google"><i class="fa fa-google"></i> Sign in with Google</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
