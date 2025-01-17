<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Game;
use Carbon\Carbon;

class RecentGames extends Component
{
    public $games;
    /**
     * Create a new component instance.
     */

    //Pega os jogos mais recentes baseado na data atual inves da release date
    //Assim evita mostrar jogos que tem uma release date no futuro
    public function __construct()
    {
        $this->games = Game::where('release_date', '<=', Carbon::today())
        ->orderByDesc('release_date')
        ->take(9)
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recent-games');
    }
}
