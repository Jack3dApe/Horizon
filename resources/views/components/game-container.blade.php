<div>
    <a href="{{ route('games.show.mainpage', ['game' => $game->id_game]) }}" class="game-link">
        <div class="product__item">
            <div class="product__item__pic set-bg" style="background-image: url('{{ $game->grid ? asset('imgs/grids/' . $game->grid) : asset('imgs/default-game.jpg') }}');">
                <div class="comment"><i class="fa fa-comments"></i> {{ $game->comments_count ?? 0 }}</div>
                <div class="view"><i class="fa fa-eye"></i> {{ $game->views ?? 0 }}</div>
            </div>
            <div class="product__item__text">
                <ul>
                    @if($game->genres && $game->genres->isNotEmpty())
                        @foreach($game->genres as $genre)
                            <li>{{ $genre->name }}</li>
                        @endforeach
                    @else
                        <li class="text-secondary">No Defined Genres</li>
                    @endif
                </ul>
                <h5 style="color: white;">{{ $game->name }}</h5>
            </div>
        </div>
    </a>
</div>
