<div class="game-reviews">
    <div class="section-title">
        <h5>{{__('messages.reviews')}}</h5>
    </div>
    @if($game->reviews->isEmpty())
        <p>{{__('messages.noreviews')}}</p>
    @else
        @foreach($game->reviews as $review)
            <div class="anime__review__item" >
                <div class="anime__review__item__pic" >
                    <img src="{{ asset($review->user->profile_pic ?? 'default-avatar.png') }}" alt="{{ $review->user->username }}">
                </div>
                <div class="anime__review__item__text"  >
                    <h6>{{ $review->user->username }} - <span>{{ $review->review_date->diffForHumans() }}</span></h6>
                    <div>
                        @if ($review->is_positive)
                            <i class="icon_like text-success"></i>
                        @else
                            <i class="icon_dislike text-danger"></i>
                        @endif

                        @if ($review->user->ownsGame($game->id_game))
                                <span class="badge ml-2" style="background-color:#e53637">{{ __('messages.owns_game_badge') }}</span>
                        @endif

                    </div>
                    <p>{{ $review->description }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
