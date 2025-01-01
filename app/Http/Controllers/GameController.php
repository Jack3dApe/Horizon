<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function indexByPublisher($publisherId)
    {
        $games = Game::where('id_publisher', $publisherId)->get();
        return response()->json($games);
    }

    public function deleted()
    {
        $games = Game::onlyTrashed()->paginate(10);
        return view('softdeletes.games.deleted', compact('games'));
    }

    public function restore($id)
    {
        $game = Game::withTrashed()->findOrFail($id);
        $game->restore();
        return redirect()->route('games.deleted')->with('success', 'Game restored successfully.');
    }

    public function forceDelete($id)
    {
        $game = Game::withTrashed()->findOrFail($id);
        $game->forceDelete();
        return redirect()->route('games.deleted')->with('success', 'Game permanently deleted.');
    }


}
