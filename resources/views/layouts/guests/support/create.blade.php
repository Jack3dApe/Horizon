@extends('layouts.guests.base')
@section('title', 'Help Tickets')
@section('content')
    <div class="container-xl mt-5">
        <h2 class="mb-4 text-center" style="color: #b7b7b7"><i class="ti ti-help-circle"></i> Centro de Suporte</h2>

        <div class="col-12">
            <!-- FAQ (Perguntas Frequentes) -->
            <div class="col-12 col-lg-6 mx-auto">
                <div class="card w-100 shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="card-title"><i class="ti ti-book"></i> Perguntas Frequentes</h3>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                        <i class="ti ti-info-circle me-2"></i> Bem-vindo ao nosso serviço!
                                    </button>
                                </h2>
                                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Bem-vindo ao nosso sistema de suporte! Aqui podes criar um ticket para obter ajuda rápida e eficaz.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
                                        <i class="ti ti-users me-2"></i> Quem somos?
                                    </button>
                                </h2>
                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Somos uma equipa dedicada ao suporte ao cliente, garantindo rapidez e eficiência na resolução de problemas.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
                                        <i class="ti ti-heart me-2"></i> Os nossos valores
                                    </button>
                                </h2>
                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p>Os nossos valores baseiam-se na transparência, rapidez e qualidade no atendimento ao cliente.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulário de Suporte -->
            <div class="col-12 col-lg-6 mx-auto mt-4">
                <div class="card w-100 shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0"><i class="ti ti-headset"></i> Criar um Pedido de Suporte</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center">
                                <i class="ti ti-check me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
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
                                <label for="subject" class="form-label"><i class="ti ti-heading"></i> Assunto</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Escreve um assunto..." required>
                            </div>

                            <!-- Descrição do problema -->
                            <div class="mb-3">
                                <label for="description" class="form-label"><i class="ti ti-message"></i> Descrição do Problema</label>
                                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Descreve detalhadamente o teu problema..." required></textarea>
                            </div>

                            <!-- Botão de submissão -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="ti ti-send"></i> Enviar Pedido
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
