<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Wishlist;
use App\Models\Review;
use App\Models\Library;

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_publisher' => 'required|exists:publishers,id_publisher',
            'genres' => 'required|array',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|in:Overwhelmingly Positive,Very Positive,Positive,Mostly Positive,Mixed,Mostly Negative,Negative,Very Negative,Overwhelmingly Negative',
            'release_date' => 'required|date',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'grid' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description_en' => 'nullable|string|max:1000',
            'description_pt' => 'nullable|string|max:1000',
            //screenshot_1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            //'screenshot_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|',
            //'screenshot_3' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            //'screenshot_4' => 'nullable|image|mimes:jpeg,png,jpg,gif',

        ]);

        if ($request->hasFile('icon')) {
            $iconPath = public_path('icons');
            $filename = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move($iconPath, $filename);
            $validated['icon'] = "$filename";
        }

        if ($request->hasFile('banner')) {
            $bannerPath = public_path('imgs/banners');
            $filename = $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move($bannerPath, $filename);
            $validated['banner'] = "$filename";
        }

        if ($request->hasFile('grid')) {
            $gridPath = public_path('imgs/grids');
            $filename = $request->file('grid')->getClientOriginalName();
            $request->file('grid')->move($gridPath, $filename);
            $validated['grid'] = "$filename";
        }


        if ($request->hasFile('logo')) {
            $logoPath = public_path('imgs/logos');
            $filename = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($logoPath, $filename);
            $validated['logo'] = "$filename";
        }



        for ($i = 1; $i <= 4; $i++) {
            $screenshotField = "screenshot_{$i}";
            if ($request->hasFile($screenshotField)) {
                $storedPath = $request->file($screenshotField)->store('imgs/screenshoots', 'public');
                $validated[$screenshotField] = basename($storedPath);
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
        $discounts = \App\Models\Discount::all();
        $publishers = \App\Models\Publisher::all();
        $genres = \App\Models\Genre::all();

        return view('games.edit', compact('game', 'publishers', 'genres'));
    }

    public function update(Request $request, Game $game)
    {
        //dd($request->all());

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_publisher' => 'required|exists:publishers,id_publisher',
            'genres' => 'required|array',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|in:Overwhelmingly Positive,Very Positive,Positive,Mostly Positive,Mixed,Mostly Negative,Negative,Very Negative,Overwhelmingly Negative',
            'release_date' => 'required|date',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner' => '|image|mimes:jpeg,png,jpg,gif',
            'grid' => '|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'description_en' => 'nullable|string|max:1000',
            'description_pt' => 'nullable|string|max:1000',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date|after_or_equal:discount_start_date',
            //'screenshot_1' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            //'screenshot_2' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            //'screenshot_3' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            //'screenshot_4' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('icon')) {
            $iconPath = public_path('icons');
            $filename = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move($iconPath, $filename);
            $validated['icon'] = "$filename";
        }

        if ($request->hasFile('banner')) {
            $bannerPath = public_path('imgs/banners');
            $filename = $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move($bannerPath, $filename);
            $validated['banner'] = "$filename";
        }

        if ($request->hasFile('grid')) {
            $gridPath = public_path('imgs/grids');
            $filename = $request->file('grid')->getClientOriginalName();
            $request->file('grid')->move($gridPath, $filename);
            $validated['grid'] = "$filename";
        }

        if ($request->hasFile('logo')) {
            $logoPath = public_path('imgs/logos');
            $filename = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($logoPath, $filename);
            $validated['logo'] = "$filename";
        }

        for ($i = 1; $i <= 4; $i++) {
            $screenshotField = "screenshot_{$i}";
            if ($request->hasFile($screenshotField)) {
                $validated[$screenshotField] = $request->file($screenshotField)->store('imgs/screenshoots', 'public');
            }
        }

        $game->update($validated);

        $game->genres()->sync($request->input('genres'));

        if (!empty($validated['discount_percentage']) && $validated['discount_percentage'] > 0) {
            $game->discount()->updateOrCreate(
                ['id_game' => $game->id_game],
                [
                    'discount_percentage' => $validated['discount_percentage'] ?? 0,
                    'start_date' => $validated['discount_start_date'] ?? null,
                    'end_date' => $validated['discount_end_date'] ?? null,
                ]
            );
        } else {
            $game->discount()->delete();
        }

        return redirect()->route('games.index')->with('success', 'Game updated successfully.');
    }



    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game has been soft deleted successfully.');
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

    public function gamesByGenre($genreId)
    {
        $genre = Genre::findOrFail($genreId);
        $games = $genre->games()->paginate(15);

        return view('layouts.guests.gamesByGenre.index', compact('genre', 'games'));
    }


    public function showGame(Game $game)
    {
        $user = auth()->user();

        // Verificar se o utilizador está autenticado e se já fez uma review
        $reviewExists = $user && Review::where('id_user', $user->id_user)
                ->where('id_game', $game->id_game)
                ->exists();

        // Verificar se o jogo está na wishlist
        $isWishlisted = $user && Wishlist::where('id_user', $user->id_user)
                ->where('id_game', $game->id_game)
                ->exists();

        $gameOwned = $user && Library::where('id_game', $game->id_game)->exists();

        // Passar as variáveis para a view
        return view('layouts.guests.gameDetails.show', compact('game', 'isWishlisted', 'reviewExists', 'gameOwned'));
    }




}
