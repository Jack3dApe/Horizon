<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Game;
use Carbon\Carbon;

class TopGames extends Component
{
    public $topGames;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $now = Carbon::now();

        $this->topGames = [
            'day' => Game::with('genres')
                ->withCount(['reviews as positive_reviews' => function ($query) use ($now) {
                    $query->where('is_positive', true)->whereDate('review_date', $now->toDateString());
                }])
                ->orderByDesc('positive_reviews')
                ->take(10)
                ->get(),
            'week' => Game::with('genres')
                ->withCount(['reviews as positive_reviews' => function ($query) use ($now) {
                    $query->where('is_positive', true)->whereBetween('review_date', [$now->startOfWeek(), $now->endOfWeek()]);
                }])
                ->orderByDesc('positive_reviews')
                ->take(10)
                ->get(),
            'month' => Game::with('genres')
                ->withCount(['reviews as positive_reviews' => function ($query) use ($now) {
                    $query->where('is_positive', true)->whereMonth('review_date', $now->month)->whereYear('review_date', $now->year);
                }])
                ->orderByDesc('positive_reviews')
                ->take(10)
                ->get(),
            'all_time' => Game::with('genres')
                ->withCount(['reviews as positive_reviews' => function ($query) {
                    $query->where('is_positive', true);
                }])
                ->orderByDesc('positive_reviews')
                ->take(10)
                ->get(),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.top-games');
    }
}
