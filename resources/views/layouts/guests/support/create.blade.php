@extends('layouts.guests.base')
@section('title', 'Help Tickets')
@section('content')
    <div class="container-xl mt-1 vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 align-items-center">

        <!-- Formulário de Suporte -->
            <div class="col-12 col-lg-6 mb-5">
                <div class="card w-100 shadow-lg" style="background-color: #070720; border: none;">
                    <div class="card-header" style="background-color: #e53637; border-bottom: 2px solid #ffffff;">
                        <h3 class="mb-0 text-white"><i class="ti ti-headset"></i> {{__('messages.createsupportrequest')}}</h3>
                    </div>
                    <div class="card-body" style="color: #ffffff;">
                        @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center" style="background-color: #0d6efd; color: #ffffff;">
                                <i class="ti ti-check me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger" style="background-color: #dc3545; color: #ffffff;">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li><i class="ti ti-alert-circle me-2"></i>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('support.tickets.store') }}">
                            @csrf

                            <!-- Email do utilizador (campo oculto) -->
                            <input type="hidden" name="user_email" value="{{ auth()->user()->email }}">

                            <!-- Assunto do ticket -->
                            <div class="mb-3">
                                <label for="subject" class="form-label text-white"><i class="ti ti-feather"></i> {{__('messages.supportticketmain')}}</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="{{__('messages.supportticketmainmsg')}}" required style="background-color: #070720; color: #ffffff; border: 1px solid #ffffff;">
                            </div>

                            <!-- Descrição do problema -->
                            <div class="mb-3">
                                <label for="description" class="form-label text-white"><i class="ti ti-message"></i> {{__('messages.supportticketdescr')}}</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="{{__('messages.supportticketdescrmsg')}}" required style="background-color: #070720; color: #ffffff; border: 1px solid #ffffff;"></textarea>
                            </div>

                            <!-- Botão de submissão -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-lg" style="background-color: #e53637; color: #ffffff;">
                                    <i class="ti ti-send"></i> {{__('messages.supportticketsendbtn')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-3 shadow-lg" style="background-color: #070720; border: none;">
                    <div class="card-body text-center">
                        <h4 class="mb-3 text-white"><i class="ti ti-bolt"></i> Faster Response Times With Verified Accounts</h4>
                        @if(auth()->user()->is_2fa_enabled)
                            <button class="btn btn-lg btn-success" disabled>
                                <i class="ti ti-check"></i> {{ __('Activated') }}
                            </button>
                        @else
                            <form method="POST" action="{{ route('support.email.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-lg btn-warning">
                                    <i class="ti ti-send"></i> {{ __('Activate Now') }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-5">
                <img src="{{ asset('imgs/frontend/sonictechsupport.png') }}" alt="img-sonic" style="padding-bottom: 80px;">
            </div>
        </div>
    </div>
@endsection
