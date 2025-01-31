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
                        Print Receipt
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body mt-2">
        <div class="container-xl">
            <div class="card card-lg" style="border-radius: 17px; border-color: #37225F;" >
                <div class="card-body" style="background-color: #FFFDF7;border-radius: 15px;border-color: #37225F;"  >
                    <table class="table table-transparent table-responsive" style="color: #B7B7B7;">
                        <thead>
                        <tr>
                            <th  class="text-center" style="width: 1% ; color: white"></th>
                            <th style="color: black">Product</th>
                            <th class="text-end" style="width: 1%; color:black">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $total = 0; @endphp

                        @foreach($order->orderItems as $index => $item)
                            <tr>
                                <td style="color: black" class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    <p  style="color: black" class="strong mb-1">{{ $item->game->name }} </p>
                                    <div style="color: #B7B7B7">{{ $item->game->publisher->name }}</div>
                                </td>
                                <td  style="color: black" class="text-end">€{{ number_format($item->price, 2) }}</td>
                            </tr>
                        @endforeach

                        <!-- Total row -->
                        <tr>
                            <td  style="color: black" colspan="2" class="font-weight-bold text-end">Total</td>
                            <td style="color: black" class="text-end">€{{ number_format($order->total_price, 2) }}</td>
                        </tr>

                        </tbody>


                    </table>
                    <p  class=" text-center mt-5" style="color:black">Thank you very much for doing business with us. We look forward to working with
                        you again!</p>
                </div>
            </div>
        </div>
    </div>
@endsection
