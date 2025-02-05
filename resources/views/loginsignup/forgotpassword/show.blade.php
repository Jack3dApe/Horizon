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

                        <!-- Mensagem de sucesso -->
                        @if(session('success'))
                            <div class="alert alert-success mb-4" style="padding: 10px;">
                                <ul class="mb-0" style="list-style-type: disc; padding-left: 20px;">
                                    <li>{{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif

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

                        <!-- Formulário de recuperação de senha -->
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
