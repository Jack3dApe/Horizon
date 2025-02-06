<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Game;
use Carbon\Carbon;

class TrendingGames extends Component
{
    public $games;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $lastMonth = Carbon::now()->subMonth();

        // Obter os jogos mais vendidos no último mês
        $this->games = Game::select('games.*')
            ->join('order_items', 'games.id_game', '=', 'order_items.id_game')
            ->join('orders', 'orders.id_order', '=', 'order_items.id_order')
            ->where('orders.created_at', '>=', $lastMonth)
            ->groupBy('games.id_game')
            ->orderByRaw('COUNT(order_items.id_game) DESC')
            ->take(6)
            ->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.trending-games');
    }
}
