<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    protected Client $client;
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = env('FRESHDESK_URL');
        $this->apiKey = env('FRESHDESK_API_KEY');

        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'auth' => [$this->apiKey, 'X']
        ]);
    }

    /**
     * Apresenta a página para criar um novo ticket
     */
    public function create()
    {
        return view('layouts.guests.support.create');
    }

    /**
     * Regista um novo ticket no Freshdesk
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $userEmail = Auth::user()->email;

        try {
            $response = $this->client->post('tickets', [
                'json' => [
                    'email' => $userEmail,
                    'subject' => $request->subject,
                    'description' => $request->description,
                    'status' => 2, // Estado "Aberto"
                    'priority' => 1
                ]
            ]);

            return redirect()->route('support.tickets.create')->with('success', 'O ticket foi criado com sucesso!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocorreu um erro ao criar o ticket: ' . $e->getMessage()]);
        }
    }

    /**
     * Lista todos os tickets (apenas admins)
     */
    public function index()
    {
        try {
            $response = $this->client->get('tickets'); // Busca todos os tickets no Freshdesk
            $tickets = json_decode($response->getBody(), true);

            return view('supporttickets.index', compact('tickets'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocorreu um erro ao obter os tickets: ' . $e->getMessage()]);
        }
    }

    /**
     * Apresenta os detalhes de um ticket específico (apenas admins)
     */
    public function show($id)
    {
        try {
            $response = $this->client->get("tickets/{$id}");
            $ticket = json_decode($response->getBody(), true);

            return view('supporttickets.show', compact('ticket'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocorreu um erro ao obter os detalhes do ticket: ' . $e->getMessage()]);
        }
    }
}
