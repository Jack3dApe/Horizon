<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Publisher;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');

        // Buscar jogos pelo nome, nome da publisher e descrição
        $games = Game::where('name', 'like', "%$query%")
            ->orWhereHas('publisher', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->orWhere('description_en', 'like', "%$query%")
            ->orWhere('description_pt', 'like', "%$query%")
            ->paginate(15);

        return view('layouts.guests.search.results', compact('games', 'query'));
    }
}
