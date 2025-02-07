@extends('layouts.admin.base')

@section('title', 'Game Details')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <h4 class="mb-0"><i class="ti ti-device-gamepad"></i> Game Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="mb-4">
                                    @if($game->icon)
                                        <img src="{{ asset('icons/' . $game->icon) }}" alt="Game Icon" class="img-thumbnail" width="100">
                                    @else
                                        <p class="text-secondary">No Icon Available</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    @if($game->banner)
                                        <img src="{{ asset('imgs/banners/' . $game->banner) }}" alt="Game Banner" class="img-thumbnail" width="300">
                                    @else
                                        <p class="text-secondary">No Banner Available</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    @if($game->grid)
                                        <img src="{{ asset('imgs/grids/' . $game->grid) }}" alt="Game Grid" class="img-thumbnail" width="150">
                                    @else
                                        <p class="text-secondary">No Grid Available</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    @if($game->logo)
                                        <img src="{{ asset('imgs/logos/' . $game->logo) }}" alt="Game Logo" class="img-thumbnail" width="150">
                                    @else
                                        <p class="text-secondary">No Logo Available</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-key"></i> Game ID:</label>
                                    <p class="text-muted">{{ $game->id_game }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-device-gamepad"></i> Game Name:</label>
                                    <p class="text-muted">{{ $game->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-building"></i> Publisher:</label>
                                    <p class="text-muted">{{ $game->publisher->name ?? 'Not Available' }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-tags"></i> Genres:</label>
                                    @if($game->genres->isNotEmpty())
                                        <p class="text-muted">{{ $game->genres->pluck('name')->join(', ') }}</p>
                                    @else
                                        <p class="text-secondary">No Genres Assigned</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-currency-euro"></i> Price:</label>
                                    <p class="text-muted">{{ number_format($game->price, 2) }}€</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-star"></i> Rating:</label>
                                    <p><x-game-rating :game="$game" /></p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-calendar"></i> Release Date:</label>
                                    <p class="text-muted">{{ $game->release_date ? $game->release_date->format('d/m/Y') : 'Not Available' }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-file-text"></i> Description (EN):</label>
                                    <p class="text-muted">{{ $game->description_en ?? 'No description available.' }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold"><i class="ti ti-file-text"></i> Description (PT):</label>
                                    <p class="text-muted">{{ $game->description_pt ?? 'No description available.' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-4">
                            <a href="{{ route('games.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">
                                <i class="ti ti-list"></i> Show all games
                            </a>
                            <a href="{{ route('games.edit', $game->id_game) }}" class="btn btn-warning text-white rounded-pill px-4 py-2">
                                <i class="ti ti-pencil"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
