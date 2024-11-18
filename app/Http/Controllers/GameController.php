<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function indexByPublisher($publisherId)
    {
        $games = Game::where('id_publisher', $publisherId)->get();
        return response()->json($games);
    }

}
