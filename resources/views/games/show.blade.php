@extends('layouts.admin.base')

@section('title', 'Game Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Coluna das Imagens -->
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
                                @if($game->grid)
                                    <img src="{{ asset('imgs/grids/' . $game->grid) }}" alt="Game Grid" class="img-thumbnail" width="150">
                                @else
                                    <p class="text-secondary">No Icon Available</p>
                                @endif
                            </div>

                            <!-- Coluna do Texto -->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Game Name:</label>
                                    <p>{{ $game->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Publisher:</label>
                                    <p>{{ $game->publisher->name ?? 'Not Available' }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Genres:</label>
                                    @if($game->genres->isNotEmpty())
                                        <p>{{ $game->genres->pluck('name')->join(', ') }}</p>
                                    @else
                                        <p class="text-secondary">No Genres Assigned</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price:</label>
                                    <p>${{ number_format($game->price, 2) }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rating:</label>
                                    <p><x-game-rating :game="$game" /></p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Release Date:</label>
                                    <p>{{ $game->release_date ? $game->release_date->format('d/m/Y') : 'Not Available' }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description:</label>
                                    <p>{{ $game->description ?? 'No description available.' }}</p>
                                </div>

                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="text-end mt-4">
                            <a href="{{ route('games.edit', $game->id_game) }}" class="btn btn-warning">
                                <i class="ti ti-pencil"></i> Edit
                            </a>
                            <a href="{{ route('games.index') }}" class="btn btn-secondary">
                                <i class="ti ti-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
