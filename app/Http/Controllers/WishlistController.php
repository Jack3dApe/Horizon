<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $games = $user->wishlist()->with('genres')->get();

        return view('wishlist.index', compact('games'));
    }



    public function show($gameId)
    {
        $game = Game::with('genres')->findOrFail($gameId);

        // Verifica se o jogo está na wishlist do usuário autenticado
        $isWishlisted = false;
        if (Auth::check()) {
            $isWishlisted = Auth::user()->wishlists->contains($gameId);
        }

        return view('layouts.guests.gameDetails.show', compact('game', 'isWishlisted'));
    }


    public function toggleWishlist($gameId)
    {
        $userId = auth()->id();

        // Ve se o jogo está na wishlist
        $wishlist = Wishlist::where('id_user', $userId)->where('id_game', $gameId)->first();

        if ($wishlist) {
            // Remove o jogo da wishlist
            $wishlist->delete();
            return response()->json(['status' => 'removed']);
        } else {
            // Adiciona o jogo à wishlist
            Wishlist::create([
                'id_user' => $userId,
                'id_game' => $gameId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }

}
