<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product__sidebar">
        <div class="product__sidebar__view">
            <div class="section-title">
                <h5>{{__('messages.topgames')}}</h5>
            </div>
            <ul class="filter__controls">
                <li class="active" data-filter="day">{{__('messages.day')}}</li>
                <li data-filter="week">{{__('messages.week')}}</li>
                <li data-filter="month">{{__('messages.month')}}</li>
                <li data-filter="all_time">{{__('messages.alltime')}}</li>
            </ul>
            <div class="filter__gallery">
                @foreach ($topGames as $timeframe => $games)
                    <div class="filter__gallery__item {{ $timeframe }}" style="{{ $timeframe === 'day' ? '' : 'display:none;' }}">
                        @foreach ($games as $game)

                            <div class="product__sidebar__view__item set-bg mix" style="background-image: url('{{ asset('imgs/banners/' . $game->banner) }}')">
                                <div class="ep">
                                    @php
                                        $discountedPrice = $game->discount ? $game->price - ($game->price * ($game->discount->discount_percentage / 100)) : $game->price;
                                    @endphp

                                    @if(app()->getLocale() == 'en')
                                        @if($game->price == 0)
                                            Free to Play
                                        @else
                                            @if($game->discount)
                                                <span class="text-muted text-decoration-line-through">£{{ number_format($game->price * 0.84, 2) }}</span>
                                                <span class="text-light ms-2">£{{ number_format($discountedPrice * 0.84, 2) }}</span>
                                            @else
                                                £{{ number_format($game->price * 0.84, 2) }}
                                            @endif
                                        @endif
                                    @elseif(app()->getLocale() == 'pt')
                                        @if($game->price == 0)
                                            Gratuito
                                        @else
                                            @if($game->discount)
                                                <span class="text-muted text-decoration-line-through">€{{ number_format($game->price, 2) }}</span>
                                                <span class="text-light ms-2">€{{ number_format($discountedPrice, 2) }}</span>
                                            @else
                                                €{{ number_format($game->price, 2) }}
                                            @endif
                                        @endif
                                    @endif
                                </div>

                                <h5><a href="{{ route('games.show.mainpage', $game->id_game) }}">{{ $game->name }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



