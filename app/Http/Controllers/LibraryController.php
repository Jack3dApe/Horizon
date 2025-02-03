<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Buscar jogos na biblioteca do utilizador
        $libraries = Library::with('game')->where('id_user', $user->id_user)->get();

        return response()->json($libraries);
    }
    /**
     * Adiciona um jogo à biblioteca (caso necessário manualmente).
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_game' => 'required|exists:games,id_game',
        ]);

        $user = Auth::user();

        // Adicionar o jogo à biblioteca
        $library = Library::create([
            'id_user' => $user->id_user,
            'id_game' => $request->id_game,
        ]);

        return response()->json($library, 201);
    }

    /**
     * Mostra os detalhes de um jogo na biblioteca.
     */
    public function show($id)
    {
        $library = Library::with('game')->findOrFail($id);
        return response()->json($library);
    }


}
