<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Wishlist;
use App\Models\User;

class UserWishlist extends Component
{
    public $user;
    public $wishlistCount;

    /**
     * Create a new component instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $wishlistGames = \App\Models\Wishlist::where('id_user', $this->user->id_user)
            ->with('game')
            ->get();
        //dd($wishlistGames);
        $this->wishlistCount = \App\Models\Wishlist::where('id_user', $this->user->id_user)->count();

        //$wishlistGames = $this->user->wishlist()->with('game')->get();
        return view('components.user-wishlist', compact('wishlistGames'));    }
}
