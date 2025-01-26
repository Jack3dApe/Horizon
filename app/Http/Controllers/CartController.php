<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {
        $id_user = Auth::id();

        // Obtem os jogos do carrinho do user logado
        $cartItems = Cart::where('id_user', $id_user)
            ->with('game')
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'id_game' => 'required|exists:games,id_game',
        ]);

        $id_user = Auth::id();
        $id_game = $request->input('id_game');

        // Ve se o jogo ja esta no carrinho
        $existingCartItem = Cart::where('id_user', $id_user)
            ->where('id_game', $id_game)
            ->first();

        if ($existingCartItem) {
            return response()->json(['message' => 'Game already added'], 409);
        }

        // Cria o carrinho
        Cart::create([
            'id_user' => $id_user,
            'id_game' => $id_game,
        ]);



        return response()->json(['message' => 'Game added to cart!'], 201);
    }

    public function remove(Request $request, $id_game)
    {
        $id_user = Auth::id();

        $cartItem = Cart::where('id_user', $id_user)
            ->where('id_game', $id_game)
            ->first();

        if (!$cartItem) {
            return response()->json(['message' => 'O jogo não está no carrinho.'], 404);
        }

        $cartItem->delete();

        return response()->json(['message' => 'Jogo removido do carrinho com sucesso.'], 200);
    }

    public function clear()
    {
        $id_user = Auth::id();

        Cart::where('id_user', $id_user)->delete();

        return response()->json(['message' => 'Carrinho esvaziado com sucesso.'], 200);
    }

    public function merge()
    {
        $guestCart = session()->get('cart', []);

        if (Auth::check()) {
            $id_user = Auth::id();

            foreach ($guestCart as $id_game) {
                $existingCartItem = Cart::where('id_user', $id_user)
                    ->where('id_game', $id_game)
                    ->first();

                if (!$existingCartItem) {
                    Cart::create([
                        'id_user' => $id_user,
                        'id_game' => $id_game,
                    ]);
                }
            }

            // Limpa o carrinho do guest
            session()->forget('cart');
        }
    }


}
