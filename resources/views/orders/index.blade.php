@extends('layouts.admin.base')
@section('title', 'Order List')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">
                        <form action="{{ route('admin.search.orders') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ request('query') }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all"></th>
                        <th class="w-1">Order ID</th>
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Total Price</th>
                        <th>Created At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select order"></td>
                            <td><span class="text-secondary">{{ $order->id_order }}</span></td>
                            <td>{{ $order->id_user }}</td>
                            <td>{{ $order->user->email ?? 'N/A' }}</td>
                            <td>{{ $order->user->username ?? 'N/A' }}</td>
                            <td>{{ number_format($order->total_price, 2) }}€</td>
                            <td>{{ $order->created_at->format('m/d/Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admindashboard.orders.show', $order->id_order) }}" class="btn btn-info">
                                    <i class="ti ti-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No orders found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex align-items-center">
                {{ $orders->links('layouts.admin.parts.paginationOrder', ['orders' => $orders]) }}
            </div>
        </div>
    </div>
@endsection
