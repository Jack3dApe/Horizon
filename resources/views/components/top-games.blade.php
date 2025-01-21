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
                                    @if(app()->getLocale() == 'en')
                                        {{ $game->price == 0 ? 'Free to Play' : '£' . number_format($game->price * 0.84, 2) }}
                                    @elseif(app()->getLocale() == 'pt')
                                        {{ $game->price == 0 ? 'Gratuito' : '€' . number_format($game->price, 2) }}
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



