<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Game;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $totalPrice = 0;
        $cart = session()->get('cart', []);

        foreach ($cart as $item) {
            $totalPrice += $item['price'];
        }

        return view('cart.index', compact('cart', 'totalPrice'));
    }

    public function addToCart(string $id_game)
    {
        $game = Game::with('discount')->find($id_game);
        $cart = session()->get('cart', []);

        // Verificar se o jogo já está no carrinho
        if (isset($cart[$id_game])) {
            return redirect()->back()->with('info', 'Game already in your cart!');
        }

        // Calcular o preço com desconto, se existir
        $discountedPrice = $game->price;
        if ($game->discount && now()->between($game->discount->start_date, $game->discount->end_date)) {
            $discountedPrice = $game->price - ($game->price * ($game->discount->discount_percentage / 100));
        }

        // Adicionar o jogo ao carrinho
        $cart[$id_game] = [
            'name' => $game->name,
            'price' => $game->price,
            'discounted_price' => $discountedPrice,
            'discount_percentage' => $game->discount->discount_percentage ?? 0,
            'grid' => $game->grid,
            'publisher' => $game->publisher->name ?? 'Unknown',
        ];

        // Atualizar a sessão
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Game added to cart successfully!');
    }


    public function update(Request $request, $id_game)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id_game])) {
            unset($cart[$id_game]);
            session()->put('cart', $cart);

            return redirect()->route('cart.index')->with('success', 'Game removed from cart successfully!');
        }

        return redirect()->route('cart.index')->with('error', 'Game not found!.');
    }

    public function remove(string $id_game)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id_game])) {
            unset($cart[$id_game]);
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Game removed from cart successfully!');
    }



    public function merge()
    {
        if (Auth::check()) {
            $id_user = Auth::id();
            $cartSession = session()->get('cart', []);
            $cartDB = Cart::where('id_user', $id_user)->get();

            foreach ($cartDB as $item) {
                if (isset($cartSession[$item->id_game])) {
                    // Se o jogo já existe na sessão
                    continue;
                } else {
                    $cartSession[$item->id_game] = [
                        'name' => $item->game->name,
                        'price' => $item->game->price,
                        'publisher' => $item->game->publisher->name,
                        'grid' => $item->game->grid,
                    ];
                }
            }

            // Atualizar a sessão com os dados merged
            session()->put('cart', $cartSession);

            // Limpar os itens do carrinho na base de dados
            Cart::where('id_user', $id_user)->delete();
        }
    }


}
