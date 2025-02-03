@extends('layouts.admin.base')
@section('title', 'Overview')
@section('content')
    <div class="col-12">
        <div class="row row-cards">
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="avatar" style="background-color: #FFD700; color: white;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 1 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                    <path d="M12 3v3m0 12v3" />
                                </svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    €{{ number_format($monthlyEarnings, 2) }} Earned ({{ now()->monthName }})
                                </div>
                                <div class="text-secondary">
                                    €{{ number_format($yearlyEarnings, 2) }} Earned ({{ now()->year }})
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    {{ $monthlySales }} Sales ({{ now()->monthName }})
                                </div>
                                <div class="text-secondary">
                                    {{ $yearlySales }} Sales ({{ now()->year }})
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="7" r="4" />
                                    <path d="M5.5 21h13a2 2 0 0 0 2 -2v-1a7 7 0 0 0 -7 -7h-3a7 7 0 0 0 -7 7v1a2 2 0 0 0 2 2" />
                                </svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    {{ $totalUsers }}
                                </div>
                                <div class="text-secondary">
                                    Users
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            <span class="avatar" style="background-color: #6A0DAD; color: white;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <rect x="2" y="6" width="20" height="12" rx="2" />
                                    <path d="M6 12h4m-2 -2v4" />
                                    <line x1="15" y1="11" x2="15" y2="11.01" />
                                    <line x1="18" y1="13" x2="18" y2="13.01" />
                                </svg>
                            </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    {{ $totalGames }}
                                </div>
                                <div class="text-secondary">
                                    Games
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 3vh;">
        <!-- Card Activity Log -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header-notif">
                    <h1>Activity Log</h1>
                    <a href="{{ route('admin.notifications') }}" class="btn btn-primary">Show All</a>
                </div>
                <div class="card-body">
                    <x-activity-log />
                </div>
            </div>
        </div>

        <!-- Card Top Sales -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Top Sales</h3>
                    <table class="table table-sm table-borderless">
                        <thead>
                        <tr>
                            <th>Games</th>
                            <th class="text-end">Sales</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($topSales as $sale)
                            <tr>
                                <td>
                                    <div class="progressbg">
                                        <div class="progress progressbg-progress">
                                            <div class="progress-bar bg-primary-lt"
                                                 style="width: {{ number_format($sale->percentage, 2) }}%"
                                                 role="progressbar"
                                                 aria-valuenow="{{ number_format($sale->percentage, 2) }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 aria-label="{{ number_format($sale->percentage, 2) }}% Complete">
                                                <span class="visually-hidden">{{ number_format($sale->percentage, 2) }}% Complete</span>
                                            </div>
                                        </div>
                                        <div class="progressbg-text">{{ $sale->game_name }}</div>
                                    </div>
                                </td>
                                <td class="w-1 fw-bold text-end">{{ $sale->sales_count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
