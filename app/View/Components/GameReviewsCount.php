<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Game;

class GameReviewsCount extends Component
{
    public $game;
    /**
     * Create a new component instance.
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $reviewsCount = $this->game->reviews()->count();
        return view('components.game-reviews-count', compact('reviewsCount'));
    }
}
