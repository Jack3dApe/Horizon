<script>
    const translations = {
        wishlisted: @json(__('messages.wishlisted')),
        addwishlist: @json(__('messages.addwishlist')),
    };
</script>

<button class="follow-btn" id="wishlist-btn" data-id-game="{{ $game->id_game }}">
<i id="heart-icon" class="fa {{ $isWishlisted ? 'fa-heart' : 'fa-heart-o' }}"></i>
    {{ $isWishlisted ? __('messages.wishlisted') : __('messages.addwishlist') }}
</button>
