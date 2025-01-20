<button class="follow-btn" id="wishlist-btn" data-id-game="{{ $game->id_game }}">
<i id="heart-icon" class="fa {{ $isWishlisted ? 'fa-heart' : 'fa-heart-o' }}"></i>
    {{ $isWishlisted ? 'Wishlisted' : 'Add to Wishlist' }}
</button>
