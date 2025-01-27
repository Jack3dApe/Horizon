<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartOffCanvas extends Component
{
    public $cartItems;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->cartItems = session()->get('cart', []);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-off-canvas', [
            'cartItems' => $this->cartItems
        ]);
    }
}
