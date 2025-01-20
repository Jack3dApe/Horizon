<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Wishlist;
use App\Models\Game;


class IsWishlisted extends Component
{
    public $game;

    /**
     * Create a new component instance.
     */
    public function __construct(Game $game)
    {
        //dd($id_game);
        $this->game = $game;
    }


        /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $isWishlisted = auth()->check() && Wishlist::where('id_user', auth()->id())
                ->where('id_game', $this->game->id_game)
                ->exists();

        return view('components.is-wishlisted', [
            'isWishlisted' => $isWishlisted,
            'game' => $this->game,
        ]);
    }
}
