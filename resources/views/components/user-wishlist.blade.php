<div class="wishlist-games" >
    @if($wishlistGames->count() > 0)
        <div class="row "  >
            @foreach($wishlistGames as $wishlist)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <x-game-container :game="$wishlist->game" />
                </div>
            @endforeach
        </div>
    @else
        <p>{{ __('messages.no_games_wishlisted_message') }}</p>
    @endif
</div>
