@extends('layouts.guests.base')
@section('title', 'Checkout')
@section('content')
    <div class="container" >
        <h1 class="h3 mb-5">Payment</h1>

        <!-- Formulário para o envio do pagamento -->
        <form action="{{ route('orders.place') }}" method="POST">

            @csrf
            <input type="hidden" name="id_order" value="{{ $order->id_order ?? '' }}">

            <div class="row " >
                <!-- Left: Opções de Pagamento -->
                <div class="col-lg-9" >
                    <div class="accordion" id="accordionPayment">
                        <!-- Credit card -->
                        <div class="accordion-item mb-3">
                            <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment1" value="credit_card" required>
                                    <label class="form-check-label pt-1" for="payment1">Credit Card</label>
                                </div>
                                <span>
                                    <!-- Icone de cartão de crédito -->
                                    <svg width="34" height="25" xmlns="http://www.w3.org/2000/svg">
                                        <g fill-rule="nonzero" fill="#333840">
                                            <path d="M29.418..."></path>
                                        </g>
                                    </svg>
                                </span>
                            </h2>
                            <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="card_number">Card Number</label>
                                        <input type="text" class="form-control" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" maxlength="19" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="name_on_card">Name on card</label>
                                                <input type="text" class="form-control" id="name_on_card" name="name_on_card" placeholder="Horizon" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="expiry_date">Expiry date</label>
                                                <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" maxlength="5" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="cvv">CVV Code</label>
                                                <input type="password" class="form-control" id="cvv" name="cvv" placeholder="123" maxlength="3" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PayPal -->
                        <div class="accordion-item mb-3 border">
                            <h2 class="h5 px-4 py-3 accordion-header d-flex justify-content-between align-items-center">
                                <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapsePP" aria-expanded="false">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment2" value="paypal">
                                    <label class="form-check-label pt-1" for="payment2">PayPal</label>
                                </div>
                                <span>
                                    <!-- Icone do PayPal -->
                                    <svg width="103" height="25" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M8.962 5.857h7.018c3.768..." fill="#009EE3"></path>
                                        </g>
                                    </svg>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- Right: Resumo do Pedido -->
                <div class="col-lg-3">
                    <div class="card position-sticky top-0">
                        <div class="p-3 bg-light bg-opacity-10">
                            <h6 class="card-title mb-3">Order Summary</h6>

                            <!-- Lista de itens no carrinho -->
                            @php $subtotal = 0; @endphp

                            @foreach($cartItems as $item)
                                <div class="d-flex justify-content-between mb-2 small">
                                    <span>{{ $item['name'] }}</span>
                                    <span>
                                    @if(app()->getLocale() == 'en')
                                    {{ $item['price'] == 0 ? 'Free to Play' : '£' . number_format($item['price'] * 0.84, 2) }}
                                @elseif(app()->getLocale() == 'pt')
                                    {{ $item['price'] == 0 ? 'Gratuito' : '€' . number_format($item['price'], 2) }}
                                @endif
                                </span>
                                </div>
                                @php $subtotal += $item['price']; @endphp
                            @endforeach

                            <!-- Subtotal -->
                            <div class="d-flex justify-content-between mb-1 small">
                                <span>Subtotal</span>
                                <span>
                                @if(app()->getLocale() == 'en')
                                        £{{ number_format($subtotal * 0.84, 2) }}
                                    @elseif(app()->getLocale() == 'pt')
                                        €{{ number_format($subtotal, 2) }}
                                    @endif
                                    </span>
                            </div>

                            <!-- Discount -->
                            <div class="d-flex justify-content-between mb-1 small">
                                <span>Discount</span>
                                <span class="text-danger">
                                @if(app()->getLocale() == 'en')
                                    -£0.00
                                @elseif(app()->getLocale() == 'pt')
                                    -€0.00
                                @endif
                            </span>
                            </div>

                            <hr>

                            <!-- Total -->
                            <div class="d-flex justify-content-between mb-4 small">
                                <span>TOTAL</span>
                                <strong class="text-dark">
                                    @if(app()->getLocale() == 'en')
                                        £{{ number_format($subtotal * 0.84, 2) }}
                                    @elseif(app()->getLocale() == 'pt')
                                        €{{ number_format($subtotal, 2) }}
                                    @endif
                                </strong>
                            </div>

                            <input type="hidden" name="amount" value="{{ $subtotal ?? '' }}">
                            <!-- Botão para enviar o formulário -->
                            <button type="submit" class="btn btn-primary w-100 mt-2 d-flex align-items-center justify-content-center" style="font-weight: bold; font-size: 16px; padding: 10px; position: relative; overflow: hidden;background-color: green">
                                <i class="fa fa-shopping-cart me-2"></i>
                                Place Order
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
