<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Game;

class GameSales extends Component
{
    public $game;
    public $salesCount;
    /**
     * Create a new component instance.
     */
    public function __construct(Game $game)
    {
        $this->salesCount = $game->orderItems()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.game-sales');
    }
}
