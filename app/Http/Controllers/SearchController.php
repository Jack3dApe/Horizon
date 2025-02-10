<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Publisher;
use App\Models\User;
use App\Models\Review;
use App\Models\SupportTicket;
use App\Services\OpenAIService;

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

    public function searchOrders(Request $request)
    {
        $query = $request->input('query');

        $orders = \App\Models\Order::with(['user', 'orderItems'])
            ->where('id_order', 'like', "%$query%")
            ->orWhere('id_user', 'like', "%$query%")
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where('email', 'like', "%$query%")
                    ->orWhere('username', 'like', "%$query%");
            })
            ->paginate(10);

        return view('orders.index', compact('orders', 'query'));
    }

    public function searchDeletedUsers(Request $request)
    {
        $query = $request->input('query');

        $users = User::onlyTrashed()
            ->when($query, function ($q) use ($query) {
                $q->where('username', 'like', "%$query%")
                    ->orWhere('email', 'like', "%$query%");
            })
            ->paginate(10);

        return view('softdeletes.users.deleted', compact('users', 'query'));
    }

    public function searchDeletedReviews(Request $request)
    {
        $query = $request->input('query');

        $reviews = Review::onlyTrashed()
            ->when($query, function ($q) use ($query) {
                $q->where('description', 'like', "%$query%")
                    ->orWhereHas('user', function ($q) use ($query) {
                        $q->where('username', 'like', "%$query%");
                    })
                    ->orWhereHas('game', function ($q) use ($query) {
                        $q->where('name', 'like', "%$query%");
                    });
            })
            ->paginate(10);

        return view('softdeletes.reviews.deleted', compact('reviews', 'query'));
    }

    public function searchDeletedPublishers(Request $request)
    {
        $query = $request->input('query');

        $publishers = Publisher::onlyTrashed()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                    ->orWhere('email', 'like', "%$query%");
            })
            ->paginate(10);

        return view('softdeletes.publishers.deleted', compact('publishers', 'query'));
    }

    public function searchDeletedGames(Request $request)
    {
        $query = $request->input('query');

        $games = Game::onlyTrashed()
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                    ->orWhereHas('publisher', function ($q) use ($query) {
                        $q->where('name', 'like', "%$query%");
                    })
                    ->orWhere('description_en', 'like', "%$query%")
                    ->orWhere('description_pt', 'like', "%$query%");
            })
            ->with(['publisher', 'genres'])
            ->paginate(10);

        return view('softdeletes.games.deleted', compact('games', 'query'));
    }

    public function searchDeletedGenres(Request $request)
    {
        $query = $request->input('query');

        $genres = Genre::onlyTrashed()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->paginate(10);

        return view('softdeletes.genres.deleted', compact('genres', 'query'));
    }


    public function aiSearch(Request $request, OpenAIService $openAIService)
    {
        // Validar a entrada do usuário
        $validated = $request->validate([
            'query' => 'required|string|max:255'
        ]);

        // Obter recomendações da IA
        $aiResponse = $openAIService->getGameRecommendations($validated['query']);

        // Interpretar a resposta da IA e buscar na base de dados
        $gameNames = $this->extractGameNames($aiResponse);

        // Buscar jogos na base de dados
        $games = Game::whereIn('name', $gameNames)->get();

        return view('layouts.guests.search.ai', compact('games'));
    }

    private function extractGameNames($responseText)
    {
        //dd($responseText);
        $cleanText = preg_replace('/[\x00-\x1F\x7F]/u', '', $responseText);

        // Testar separação mantendo o conteúdo limpo e sem aspas
        $games = explode('"', $cleanText);

        // Remover entradas vazias e limpar os nomes
        $gameNames = array_filter($games, fn($value) => trim($value) !== '');
        //dd($cleanText, $games);
        // Remover espaços extras
        return array_map('trim', $gameNames);
    }

}
