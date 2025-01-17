<div class="col-lg-4 col-md-6 col-sm-8">
    <div class="product__sidebar">
        <div class="product__sidebar__view">
            <div class="section-title">
                <h5>Top Games</h5>
            </div>
            <ul class="filter__controls">
                <li class="active" data-filter="day">Day</li>
                <li data-filter="week">Week</li>
                <li data-filter="month">Month</li>
                <li data-filter="all_time">All Time</li>
            </ul>
            <div class="filter__gallery">
                @foreach ($topGames as $timeframe => $games)
                    <div class="filter__gallery__item {{ $timeframe }}" style="{{ $timeframe === 'day' ? '' : 'display:none;' }}">
                        @foreach ($games as $game)
                            <div class="product__sidebar__view__item set-bg mix" style="background-image: url('{{ asset('imgs/banners/' . $game->banner) }}')">
                                <h5><a href="{{ route('games.show.mainpage', $game->id_game) }}">{{ $game->name }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



