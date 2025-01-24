<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    public function index($id_user)
    {
        //Log::info("WishlistController@index called with user ID: {$id_user}");

        $games = Wishlist::where('id_user', $id_user)
            ->with('game')
            ->get();


        return view('layouts.clients.wishlist', compact('games'));
    }





    public function toggleWishlist($id_game)
    {

        $id_user = auth()->id();

        // Ve se o jogo está na wishlist
        $wishlist = Wishlist::where('id_user', $id_user)->where('id_game', $id_game)->first();

        if ($wishlist) {
            Wishlist::where('id_user', $id_user)->where('id_game', $id_game)->delete();
            return response()->json(['status' => 'removed']);
        } else {
            // Adiciona o jogo à wishlist
            Wishlist::create([
                'id_user' => $id_user,
                'id_game' => $id_game,
            ]);
            return response()->json(['status' => 'added']);
        }

    }

}
