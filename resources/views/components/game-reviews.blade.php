<div class="game-reviews">
    <div class="section-title">
        <h5>Reviews</h5>
    </div>
    @if($game->reviews->isEmpty())
        <p>No reviews yet. Be the first to review this game!</p>
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
                    </div>
                    <p>{{ $review->description }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
