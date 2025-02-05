@extends('layouts.guests.base')
@section('title', 'Help Tickets')
@section('content')
    <div class="container-xl mt-8">

        <div class="row justify-content-center">
            <!-- FAQ (Perguntas Frequentes) -->
            <div class="col-12 col-lg-6 mb-5">
                <div class="card w-100 shadow-sm" style="background-color: #070720; border: none;">
                    <div class="card-header" style="background-color: #e53637; border-bottom: 2px solid #ffffff;">
                        <h3 class="card-title text-white"><i class="ti ti-book"></i> {{__('messages.freqquestions')}}</h3>
                    </div>
                    <div class="card-body" style="color: #ffffff;">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item" style="background-color: #070720; border: none;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1" style="background-color: #e53637; color: #ffffff;">
                                        <i class="ti ti-info-circle me-2"></i> {{__('messages.welcomeserv')}}
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                        <p style="color: white">{{__('messages.welcomeservmsg')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" style="background-color: #070720; border: none;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2" style="background-color: #e53637; color: #ffffff;">
                                        <i class="ti ti-users me-2"></i> {{__('messages.whoweare')}}
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                        <p style="color: white">{{__('messages.whowearemsg')}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" style="background-color: #070720; border: none;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3" style="background-color: #e53637; color: #ffffff;">
                                        <i class="ti ti-heart me-2"></i> {{__('messages.ourvalues')}}
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                        <p style="color: white">{{__('messages.ourvaluesmsg')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            </div>
        </div>
    </div>
@endsection
