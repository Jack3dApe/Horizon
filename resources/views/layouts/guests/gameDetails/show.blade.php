@extends('layouts.guests.base')
@section('title', 'Games By Genre')
@section('content')
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" style="background-image: url('{{ $game->grid ? asset('imgs/grids/' . $game->grid) : asset('imgs/default-game.jpg') }}');">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{ $game->name }}</h3>
                            </div>
                            <div class="anime__details__rating">
                                <div class="progress" style="height: 25px; width: 100%;">
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
                                                    {{ $game->price == 0 ? 'Free to Play' : '€' . number_format($game->price, 2) }}
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
                                <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> {{__('messages.addwishlist')}}</a>
                                <a href="#" class="follow-btn" style="background-color: green"><i class="fa fa-shopping-cart"></i> {{__('messages.buynow')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <x-game-reviews :game="$game" />

            </div>

                {{-- Side contentes para depois
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                        </div>
                    </div>

                </div>
                --}}

            </div>
        </div>
    </section>
@endsection
