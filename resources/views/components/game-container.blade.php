<div>
    <a href="{{ route('games.show.mainpage', ['game' => $game->id_game]) }}" class="game-link">
        <div class="product__item">
            <div class="product__item__pic set-bg" style="background-size:cover; background-position: center;  background-image: url('{{ $game->grid ? asset('imgs/grids/' . $game->grid) : asset('imgs/default-game.jpg') }}');">
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

                <div class="comment"><i class="fa fa-comments"></i> <x-game-reviews-count :game="$game" />
                </div>
                <div class="view">
                    <i class="fa-solid fa-download"></i> <x-game-sales :game="$game" />

                </div>
            </div>
            <div class="product__item__text">
                <ul>
                    @if($game->genres && $game->genres->isNotEmpty())
                        @foreach($game->genres as $genre)
                            <li>{{ $genre->name }}</li>
                        @endforeach
                    @else
                        <li class="text-secondary">{{__('messages.nogenre')}}</li>
                    @endif
                </ul>
                <h5 style="color: white;">{{ $game->name }}</h5>
            </div>
        </div>
    </a>
</div>
