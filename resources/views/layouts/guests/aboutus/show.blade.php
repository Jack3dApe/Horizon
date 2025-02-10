@extends('layouts.guests.base')
@section('title', 'About Us')
@section('content')
    <div class="container-xl mt-8">

        <div class="row justify-content-center">
            <!-- FAQ (Perguntas Frequentes) -->
            <div class="col-12 col-lg-8 mb-5">
                <div class="card w-100 shadow-sm" style="background-color: #070720; border: none;">
                    <div class="card-header" style="background-color: #e53637; border-bottom: 2px solid #ffffff;">
                        <h3 class="card-title text-white"><i class="ti ti-book"></i> {{__('messages.freqquestions')}}</h3>
                    </div>
                    <div class="card-body" style="color: #ffffff;">
                        <div class="row">
                            <!-- Coluna da esquerda -->
                            <div class="col-md-6">
                                <div class="accordion" id="faqAccordionLeft">
                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1Left" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-info-circle me-2"></i> {{__('messages.welcomeserv')}}
                                            </button>
                                        </h2>
                                        <div id="faq1Left" class="accordion-collapse collapse show" data-bs-parent="#faqAccordionLeft">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.welcomeservmsg')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2Left" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-users me-2"></i> {{__('messages.whoweare')}}
                                            </button>
                                        </h2>
                                        <div id="faq2Left" class="accordion-collapse collapse" data-bs-parent="#faqAccordionLeft">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.whowearemsg')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3Left" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-map-pin me-2"></i> {{__('messages.wherearewe')}}
                                            </button>
                                        </h2>
                                        <div id="faq3Left" class="accordion-collapse collapse" data-bs-parent="#faqAccordionLeft">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.wherearewemsg')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4Left" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-heart me-2"></i> {{__('messages.ourvalues')}}
                                            </button>
                                        </h2>
                                        <div id="faq4Left" class="accordion-collapse collapse" data-bs-parent="#faqAccordionLeft">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.ourvaluesmsg')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Coluna da direita -->
                            <div class="col-md-6">
                                <div class="accordion" id="faqAccordionRight">
                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1Right" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-credit-card me-2"></i> {{__('messages.paymentmethodscreditpaypal')}}
                                            </button>
                                        </h2>
                                        <div id="faq1Right" class="accordion-collapse collapse show" data-bs-parent="#faqAccordionRight">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.paymentmethodscreditpaypalmsg')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2Right" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-mail me-2"></i> {{__('messages.whatemailactivatedo')}}
                                            </button>
                                        </h2>
                                        <div id="faq2Right" class="accordion-collapse collapse" data-bs-parent="#faqAccordionRight">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.whatemailactivatedomsg')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3Right" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-medal me-2"></i> {{__('messages.howandwhatmedal')}}
                                            </button>
                                        </h2>
                                        <div id="faq3Right" class="accordion-collapse collapse" data-bs-parent="#faqAccordionRight">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.howandwhatmedalmsg')}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item" style="background-color: #070720; border: none;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4Right" style="background-color: #e53637; color: #ffffff;">
                                                <i class="ti ti-language me-2"></i> {{__('messages.currentlanguagespten')}}
                                            </button>
                                        </h2>
                                        <div id="faq4Right" class="accordion-collapse collapse" data-bs-parent="#faqAccordionRight">
                                            <div class="accordion-body" style="background-color: #070720; color: #ffffff;">
                                                <p style="color: white">{{__('messages.currentlanguagesptenmsg')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Fim row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
