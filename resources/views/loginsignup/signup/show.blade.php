@extends('layouts.guests.base')
@section('title', 'Signup')
@section('content')

    <section class="normal-breadcrumb" style="background-image: url('{{ asset('imgs/frontend/banner.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>{{__('messages.signup')}}</h2>
                        <p>{{__('messages.welcome')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>{{__('messages.signup')}}</h3>
                        <!-- Alteração para processar os dados -->
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="text" name="username" placeholder="{{__('messages.nameplaceholder')}}" value="{{ old('username') }}" class="@error('username') is-invalid @enderror">
                                <span class="icon_profile"></span>
                                @error('username')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="text" name="email" placeholder="{{__('messages.emailplaceholder')}}" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                                <span class="icon_mail"></span>
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
                            <div class="input__item">
                                <input type="password" name="password_confirmation" placeholder="{{__('messages.passwordconfirmplaceholder')}}">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">{{__('messages.signupnow')}}</button>
                        </form>

                        <!-- Mensagens de erro geral -->
                        @if($errors->has('error'))
                            <p style="color: red;">{{ $errors->first('error') }}</p>
                        @endif

                        <h5>{{__('messages.alreadyaccount')}} <a href="{{ route('login') }}">{{__('messages.loginexclpoint')}}</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>{{__('messages.loginwith')}}</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> {{__('messages.signinfacebook')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
