<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Game;



class GameRating extends Component
{
    public $game;
    /**
     * Create a new component instance.
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function calculateRating()
    {
        $totalReviews = $this->game->reviews()->count();
        $positiveReviews = $this->game->reviews()->where('is_positive', true)->count();

        if ($totalReviews === 0) {
            return 'No Reviews';
        }

        $positivePercentage = ($positiveReviews / $totalReviews) * 100;

        if ($totalReviews >= 100 && $positivePercentage >= 95) {
            return 'Overwhelmingly Positive';
        } elseif ($totalReviews >= 50 && $positivePercentage >= 80) {
            return 'Very Positive';
        } elseif ($totalReviews >= 10 && $positivePercentage >= 80) {
            return 'Positive';
        } elseif ($positivePercentage >= 70) {
            return 'Mostly Positive';
        } elseif ($positivePercentage >= 40) {
            return 'Mixed';
        } elseif ($positivePercentage >= 20) {
            return 'Mostly Negative';
        } elseif ($totalReviews >= 100 && $positivePercentage < 20) {
            return 'Overwhelmingly Negative';
        } elseif ($totalReviews >= 50 && $positivePercentage < 20) {
            return 'Very Negative';
        } else {
            return 'Negative';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-rating', [
            'rating' => $this->calculateRating()
        ]);
    }
}
