@extends('layouts.guests.base')
@section('title', 'Games By Genre')
@section('content')
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" style="background-image: url('{{ $game->grid ? asset('imgs/grids/' . $game->grid) : asset('imgs/default-game.jpg') }}');">
                            <div class="view">
                                <i class="fa-solid fa-download"></i> <x-game-sales :game="$game" />

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $game->name }}</h3>
                            </div>
                            <div class="anime__details__rating ml">
                                <div class="progress" style="height: 6px; width: 100%;">
                                    <div
                                        class="progress-bar
                                        @if ($game->rating_percentage >= 75)
                                            bg-success
                                        @elseif ($game->rating_percentage >= 50)
                                            bg-warning
                                        @else
                                            bg-danger
                                        @endif"
                                        role="progressbar"
                                        style="width: {{ $game->rating_percentage }}%;"
                                        aria-valuenow="{{ $game->rating_percentage }}"
                                        aria-valuemin="0"
                                        aria-valuemax="100">

                                    </div>
                                </div>

                                <span><x-game-reviews-count :game="$game" /> {{__('messages.reviews')}}</span>
                            </div>
                            <p>{{ $game ->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li>
                                                <span>{{__('messages.price')}}</span>
                                                @if(app()->getLocale() == 'en')
                                                    {{ $game->price == 0 ? 'Free to Play' : '£' . number_format($game->price * 0.84, 2) }}
                                                @elseif(app()->getLocale() == 'pt')
                                                    {{ $game->price == 0 ? 'Gratuito' : '€' . number_format($game->price, 2) }}
                                                @endif
                                            </li>
                                            <li><span>{{__('messages.publisher')}}</span> {{ $game->publisher->name ?? 'Unknown' }}</li>
                                            <li><span>{{__('messages.release')}}</span> {{ $game->release_date->format('d/m/Y') }}</li>
                                            <li><span>{{__('messages.genre')}}</span>
                                                <x-game-genres :genres="$game->genres" />

                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="anime__details__btn">
                                @if ($gameOwned)
                                    <!-- Botão "See in Library" -->
                                    <a href="{{ route('profile') }}" class="follow-btn" style="background-color: #f0ad4e; color: white;">
                                        <i class="fa-solid fa-share-from-square"></i> {{ __('messages.see_in_library_button') }}
                                    </a>
                                @else
                                    <!-- Botões de wishlist e compra -->
                                    <x-is-wishlisted :game="$game" />
                                    <a href="{{ route('cart.add', ['id_game' => $game->id_game]) }}" class="follow-btn" style="background-color: green">
                                        <i class="fa fa-shopping-cart"></i> {{ __('messages.buynow') }}
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <x-game-reviews :game="$game" />

            </div>


            @if (!$reviewExists)
                <div class="anime__details__form mt-2">
                    <div class="section-title">
                        <h5>{{ __('messages.your_review_title') }}</h5>
                    </div>

                    <!-- Formulário para submissão da review -->
                    <form action="{{ route('reviews.store', ['id_game' => $game->id_game]) }}" method="POST">
                        @csrf

                        <!-- Seleção positiva ou negativa -->
                        <div class="d-flex mb-3" >
                            <label class="form-check form-check-inline" style="background-color: green; padding: 3px 9px;border-radius: 6px">
                                <input class="form-check-input" type="radio" name="is_positive" value="1" checked>
                                <span  class="form-check-label text-light" >
                                <i class="fa fa-thumbs-up" style="color: white"></i> {{ __('messages.positive_label') }}
                            </span>
                            </label>

                            <label class="form-check form-check-inline ml-3" style="background-color: red; padding: 3px 9px;border-radius: 6px">
                                <input class="form-check-input" type="radio" name="is_positive" value="0">
                                <span class="form-check-label text-danger text-light">
                                <i class="fa fa-thumbs-down text-light"></i> {{ __('messages.negative_label') }}
                                </span>
                            </label>
                        </div>

                        <!-- Campo de comentário -->
                        <textarea name="description" class="form-control" placeholder="{{ __('messages.comment_placeholder') }}" rows="4" required></textarea>

                        <!-- Botão de submissão -->
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="fa fa-location-arrow"></i> {{ __('messages.submit_review_button') }}
                        </button>
                    </form>
                </div>
            @endif

        </div>
    </section>
@endsection
