<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GamesOwned extends Component
{
    public $games;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->games = Library::with('game')
            ->where('id_user', Auth::id())
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.games-owned');
    }
}
