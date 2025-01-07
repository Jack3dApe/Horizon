<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(10);
        return view('games.index', compact('games'));
    }

    public function create()
    {
        $publishers = \App\Models\Publisher::all();
        $genres = \App\Models\Genre::all();

        return view('games.create', compact('publishers', 'genres'));
    }

    public function store(Request $request)
    {
        echo "Hello world";

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_publisher' => 'required|exists:publishers,id_publisher',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|in:Overwhelmingly Positive,Very Positive,Positive,Mostly Positive,Mixed,Mostly Negative,Negative,Very Negative,Overwhelmingly Negative',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'screenshot_1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'screenshot_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|',
            'screenshot_3' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'screenshot_4' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('icons', 'public');
        }

        if ($request->hasFile('banner')) {
            $validated["banner"] = $request->file('banner')->store('imgs/banners', 'public');
        }


        for ($i = 1; $i <= 4; $i++) {
            $screenshotField = "screenshot_{$i}";
            if ($request->hasFile($screenshotField)) {
                $validated->$screenshotField = $request->file($screenshotField)->store('imgs/screenshoots', 'public');
            }
        }

        $game = Game::create($validated);

        $game->genres()->sync($request->input('genres'));

        return redirect()->route('games.index')->with('success', 'Game created successfully.');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_publisher' => 'required|exists:publishers,id_publisher',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|in:Overwhelmingly Positive,Very Positive,Positive,Mostly Positive,Mixed,Mostly Negative,Negative,Very Negative,Overwhelmingly Negative',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'screenshot_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'screenshot_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'screenshot_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'screenshot_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('icons', 'public');
        }

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('imgs/banners', 'public');
        }

        for ($i = 1; $i <= 4; $i++) {
            $screenshotField = "screenshot_{$i}";
            if ($request->hasFile($screenshotField)) {
                $validated[$screenshotField] = $request->file($screenshotField)->store('imgs/screenshoots', 'public');
            }
        }

        $game->update($validated);

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }


    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game deleted successfully.');
    }

    public function indexByPublisher($publisherId)
    {
        $games = Game::withCount([
            'reviews as positive_reviews' => function ($query) {
                $query->where('is_positive', true);
            },
            'reviews as total_reviews'
        ])->where('id_publisher', $publisherId)->get();

        foreach ($games as $game) {
            $game->rating = $game->calculateRating($game->positive_reviews, $game->total_reviews);
        }

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
