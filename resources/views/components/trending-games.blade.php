<div class="trending__product">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="section-title">
                <h4>{{ __('messages.trending_title') }}</h4>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
        </div>
    </div>
    <div class="row">
        @forelse($games as $game)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <x-game-container :game="$game" />
            </div>
        @empty
            <p class="text-center">{{ __('messages.nogames') }}</p>
        @endforelse
    </div>
</div>
