@extends('layouts.guests.base')
@section('title', 'Reset Password')
@section('content')

    <section class="normal-breadcrumb" style="background-image: url('{{ asset('imgs/frontend/banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>{{__('messages.resetpassword')}}</h2>
                        <p>{{__('messages.enternewpassword')}}</p>
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
                        <h3>{{__('messages.resetpassword')}}</h3>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="input__item">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="{{__('messages.emailplaceholder')}}" class="@error('email') is-invalid @enderror">
                                <span><i class="icon_mail"></i></span>
                                @error('email')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input__item">
                                <input type="password" name="password" placeholder="{{__('messages.newpasswordplaceholder')}}" class="@error('password') is-invalid @enderror">
                                <span class="icon_lock"></span>
                                @error('password')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input__item">
                                <input type="password" name="password_confirmation" placeholder="{{__('messages.passwordconfirmplaceholder')}}">
                                <span class="icon_lock"></span>
                            </div>

                            <button type="submit" class="site-btn">{{__('messages.resetpassword')}}</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>{{__('messages.welcomeback')}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
