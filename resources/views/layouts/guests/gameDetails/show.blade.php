@extends('layouts.guests.base')
@section('title', 'Games By Genre')
@section('content')
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" style="background-image: url('{{ $game->grid ? asset('imgs/grids/' . $game->grid) : asset('imgs/default-game.jpg') }}');">
                            <div class="comment"><i class="fa fa-comments"></i> <x-game-reviews-count :game="$game" /></div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $game->name }}</h3>
                            </div>
                            <div class="anime__details__rating">
                                <div class="progress" style="height: 25px; width: 10vw;">
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
                                        {{ $game->rating_percentage }}%
                                    </div>
                                </div>
                                <span><x-game-reviews-count :game="$game" /> Reviews</span>

                            </div>
                            <p>{{ $game ->description }}</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Price:</span>   {{ $game->price == 0 ? 'Free to Play' : '€' . number_format($game->price, 2) }}</li>
                                            <li><span>Publisher:</span> {{ $game->publisher->name ?? 'Unknown' }}</li>
                                            <li><span>Release Date:</span> {{ $game->release_date->format('d/m/Y') }}</li>
                                            <li><span>Genre:</span>
                                                <x-game-genres :genres="$game->genres" />

                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            {{--Butao de wishlist --}}
                            <div class="anime__details__btn">
                                <button class="follow-btn" id="wishlist-btn" data-game-id="{{ $game->id_game }}">
                                    <i id="heart-icon"
                                       class="fa {{ auth()->check() && \App\Models\Wishlist::where('id_user', auth()->id())->where('id_game', $game->id_game)->exists() ? 'fa-heart' : 'fa-heart-o' }}">
                                    </i>
                                    {{ auth()->check() && \App\Models\Wishlist::where('id_user', auth()->id())->where('id_game', $game->id_game)->exists() ? 'Wishlisted' : 'Add to Wishlist' }}
                                </button>



                            <a href="#" class="follow-btn" style="background-color: green"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <x-game-reviews :game="$game" />

            </div>
        </div>
    </section>
@endsection
