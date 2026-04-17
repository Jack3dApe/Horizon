@extends('layouts.guests.base')

@section('title', 'Order Confirmation')

@section('content')
    <div class="page-header d-print-none mt-3">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-6 btn-danger w-100" onclick="javascript:window.print();">
                        <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" /></svg>
                        {{ __('messages.print_receipt_button') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body mt-2">
        <div class="container-xl">
            <div class="card card-lg" style="border-radius: 17px; ; padding: 1px;border: 1px solid black"  >
                <div class="card-body" style="background-color: #070720;border-radius: 15px;"  >
                    <table class="table table-transparent table-responsive" style="color: #B7B7B7;">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 1%; color: #e53637"></th>
                            <th style="color: #e53637">{{ __('messages.product_column') }}</th>
                            <th class="text-end" style="width: 1%; color: #e53637">{{ __('messages.amount_column') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $subtotal = 0;
                            $totalDiscount = 0;
                        @endphp

                        @foreach($order->orderItems as $index => $item)
                            @php
                                // Cálculo do preço com e sem desconto
                                $originalPrice = $item->price;
                                $discountPercentage = $item->game->discount->discount_percentage ?? 0;
                                $discountAmount = $originalPrice * ($discountPercentage / 100);
                                $finalPrice = $originalPrice - $discountAmount;

                                // Atualizar valores totais
                                $subtotal += $originalPrice;
                                $totalDiscount += $discountAmount;
                            @endphp

                            <tr>
                                <td class="text-center" style="color: white; font-weight: bold;">{{ $index + 1 }}</td>
                                <td>
                                    <p class="mb-1" style="color: white; font-size: 16px; font-weight: bold;">{{ $item->game->name }}</p>
                                    <div style="color: #757575; font-size: 14px;">{{ $item->game->publisher->name }}</div>
                                </td>
                                <td class="text-end" style="color: white; font-size: 16px;">
                                    @if(app()->getLocale() == 'en')
                                        £{{ number_format($originalPrice * 0.84, 2) }}
                                    @elseif(app()->getLocale() == 'pt')
                                        €{{ number_format($originalPrice, 2) }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        <!-- Discount row -->
                        <tr>
                            <td colspan="2" class="font-weight-bold text-end" style="color:#757575; font-size: 18px; font-weight: bold;">
                                {{ __('messages.discount_label') }}
                            </td>
                            <td class="text-end" style="color: red; font-size: 16px; font-weight: normal;">
                                @if(app()->getLocale() == 'en')
                                    -£{{ number_format($totalDiscount * 0.84, 2) }}
                                @elseif(app()->getLocale() == 'pt')
                                    -€{{ number_format($totalDiscount, 2) }}
                                @endif
                            </td>
                        </tr>

                        <!-- Total row -->
                        <tr>
                            <td colspan="2" class="font-weight-bold text-end" style="color:#757575; font-size: 18px; font-weight: bold;">Total</td>
                            <td class="text-end" style="color: white; font-size: 18px; font-weight: bold;">
                                @php
                                    $totalAmount = $subtotal - $totalDiscount;
                                @endphp
                                @if(app()->getLocale() == 'en')
                                    £{{ number_format($totalAmount * 0.84, 2) }}
                                @elseif(app()->getLocale() == 'pt')
                                    €{{ number_format($totalAmount, 2) }}
                                @endif
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    <p class="text-center mt-5" style="color: white">{{ __('messages.thank_you_message') }}</p>

                </div>
            </div>
        </div>
    </div>
@endsection
