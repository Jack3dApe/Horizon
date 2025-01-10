<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Game;

class GameGenres extends Component
{
    public $genres;

    /**
     * Create a new component instance.
     *
     * @param array $genres
     */

    public function __construct($genres)
    {
        $this->genres = $genres;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */

    public function render(): View|string
    {
        return view('components.game-genres');
    }
}
