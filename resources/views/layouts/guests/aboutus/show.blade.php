@extends('layouts.guests.base')
@section('title', 'About Us')
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


        </div>
    </div>
@endsection
