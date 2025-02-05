<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Publisher;
use App\Models\User;
use App\Models\Review;
use App\Models\SupportTicket;

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

    public function searchPublishers(Request $request)
    {
        $query = $request->input('query');

        $publishers = Publisher::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->withCount('games')
            ->paginate(10);

        return view('publishers.index', compact('publishers', 'query'));
    }

    public function searchGames(Request $request)
    {
        $query = $request->input('query');

        $games = Game::where('name', 'like', "%$query%")
            ->orWhereHas('publisher', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->orWhere('description_en', 'like', "%$query%")
            ->orWhere('description_pt', 'like', "%$query%")
            ->with(['publisher', 'genres'])
            ->paginate(10);

        return view('games.index', compact('games', 'query'));
    }

    public function searchUsers(Request $request)
    {
        $query = $request->input('query');

        // Buscar utilizadores com base no nome, email ou telefone
        $users = User::where('username', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->paginate(10);

        return view('users.index', compact('users', 'query'));
    }

    public function searchReviews(Request $request)
    {
        $query = $request->input('query');

        $reviews = Review::whereHas('user', function ($q) use ($query) {
            $q->where('username', 'like', "%$query%");
        })
            ->orWhereHas('game', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->orWhere('description', 'like', "%$query%")
            ->with(['user', 'game'])
            ->paginate(10);

        return view('reviews.index', compact('reviews', 'query'));
    }

    public function searchTickets(Request $request)
    {
        $query = $request->input('query');

        $tickets = SupportTicket::where('subject', 'like', "%$query%")
            ->orWhere('id', 'like', "%$query%")
            ->paginate(10);

        return view('admin.supporttickets.index', compact('tickets', 'query'));
    }
}
