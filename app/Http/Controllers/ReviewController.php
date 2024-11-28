<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::paginate(10);
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $games = Game::all();
        // $users = User::all();
        // return view('reviews.create', compact('games', 'users'));
        return view('reviews.create'); // Comentei o resto para n fazer ligacoes entree tabelas ainda
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // 'id_user' => 'required|exists:users,id_user',
            // 'id_game' => 'required|exists:games,id_game',
            'is_positive' => 'required|boolean',
            'description' => 'nullable|string|max:5000',
            'review_date' => 'required|date',
        ]);

        Review::create($validated);

        return redirect()->route('reviews.index')->with('success', 'Review created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        {
            // $games = Game::all();
            // $users = User::all();
            // return view('reviews.edit', compact('review', 'games', 'users'));
            return view('reviews.edit', compact('review')); // Comentei o resto para n fazer ligacoes entree tabelas ainda
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            //'id_user' => 'required|exists:users,id_user',
            //'id_game' => 'required|exists:games,id_game',
            'is_positive' => 'required|boolean',
            'description' => 'nullable|string|max:5000',
            'review_date' => 'required|date',
        ]);

        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully');
    }
}
