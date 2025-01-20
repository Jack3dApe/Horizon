@extends('layouts.guests.base')
@section('title', 'Password Recovery')
@section('content')


    <section class="normal-breadcrumb" style="background-image: url('{{ asset('imgs/frontend/banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>{{__('messages.passrecovery')}}</h2>
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
                        <h3>{{__('messages.passrecovery')}}</h3>

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
                                <input type="text" name="email" placeholder="{{__('messages.emailplaceholder')}}" value="{{ old('email') }}">
                                <span>
                                    <i class="icon_mail"></i>
                                </span>
                            </div>
                            <button type="submit" class="site-btn">{{__('messages.requestpassword')}}</button>
                        </form>
                        <a href="{{ route('login') }}" class="forget_pass">{{__('messages.cancel')}}</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>{{__('messages.noaccount')}}</h3>
                        <a href="{{ route('register') }}" class="primary-btn">{{__('messages.registernow')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
