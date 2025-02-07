@extends('layouts.admin.base')

@section('title', 'Order Details')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <h4 class="mb-0"><i class="ti ti-shopping-cart"></i> Order Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-key"></i> Order ID:</label>
                                    <p class="text-muted">{{ $order->id_order }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-user"></i> User:</label>
                                    <p class="text-muted">
                                        {{ $order->user->username ?? 'N/A' }} ({{ $order->user->email ?? 'N/A' }})
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-currency-euro"></i> Total Price:</label>
                                    <p class="text-muted">{{ number_format($order->total_price, 2) }}€</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-calendar"></i> Created At:</label>
                                    <p class="text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h5 class="fw-bold"><i class="ti ti-box"></i> Order Items</h5>
                                <ul class="list-group">
                                    @foreach($order->orderItems as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>{{ $item->game->name ?? 'Unknown Game' }} [ID:{{ $item->id_game }}]</span>
                                            <span>{{ number_format($item->price, 2) }}€</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('admindashboard.orders.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                <i class="ti ti-list"></i> Show all orders
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
