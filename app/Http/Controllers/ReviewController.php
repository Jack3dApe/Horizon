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
        $games = Game::all();
        $users = User::all();
        return view('reviews.create', compact('games', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_game' => 'required|exists:games,id_game',
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
            $games = Game::all();
            $users = User::all();
            return view('reviews.edit', compact('review', 'games', 'users'));
            return view('reviews.edit', compact('review'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_game' => 'required|exists:games,id_game',
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

    public function deleted()
    {
        $reviews = Review::onlyTrashed()->paginate(10);
        return view('softdeletes.reviews.deleted', compact('reviews'));
    }

    public function restore($id_review)
    {
        $review = Review::withTrashed()->where('id_review', $id_review)->firstOrFail();
        $review->restore();
        return redirect()->route('reviews.deleted')->with('success', 'Review restored successfully.');
    }

    public function forceDelete($id_review)
    {
        $review = Review::withTrashed()->where('id_review', $id_review)->firstOrFail();
        $review->forceDelete();
        return redirect()->route('reviews.deleted')->with('success', 'Review permanently deleted.');
    }


    public function showReviewForm($id_game)
    {
        $user = auth()->user();

        // Verificar se o utilizador já tem uma review para o jogo
        $reviewExists = Review::where('id_user', $user->id_user)
            ->where('id_game', $id_game)
            ->exists();

        // Se a review já existe, redirecionar ou exibir outra informação
        if ($reviewExists) {
            return redirect()->route('games.details', ['id_game' => $id_game]);  // Muda conforme tua lógica
        }

        // Carregar o jogo
        $game = Game::findOrFail($id_game);

        return view('reviews.user', compact('game', 'reviewExists'));
    }

    public function storeReview(Request $request, $id_game)
    {
        $validatedData = $request->validate([
            'is_positive' => 'required|boolean',
            'description' => 'required|string|max:1000',
        ]);

        $user = auth()->user();

        // Criar ou atualizar a review
        Review::updateOrCreate(
            [
                'id_user' => $user->id_user,
                'id_game' => $id_game,
            ],
            [
                'is_positive' => $validatedData['is_positive'],
                'description' => $validatedData['description'],
                'review_date' => now(),
            ]
        );

        return redirect()->back()->with('success', 'Your review has been submitted successfully.');
    }

}
