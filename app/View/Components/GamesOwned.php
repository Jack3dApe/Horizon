<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Library;

class GamesOwned extends Component
{
    public $games;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->games = Library::where('id_user', Auth::id())->pluck('id_game')->toArray();

    }

    public function hasGame($id_game): bool
    {
        return in_array($id_game, $this->games);
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.games-owned');
    }
}
