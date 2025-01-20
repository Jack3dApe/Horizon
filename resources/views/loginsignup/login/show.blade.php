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
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="text" name="email" placeholder="{{__('messages.emailplaceholder')}}" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                                <span>
                                    <i class="icon_mail"></i>
                                </span>
                                @error('email')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="password" name="password" placeholder="{{__('messages.passwordplaceholder')}}" class="@error('password') is-invalid @enderror">
                                <span class="icon_lock"></span>
                                @error('password')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="site-btn">{{__('messages.loginnow')}}</button>
                        </form>
                        @if($errors->has('error'))
                            <p style="color: red;">{{ $errors->first('error') }}</p>
                        @endif
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
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> {{__('messages.signinfacebook')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
