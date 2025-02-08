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
     * Regista um novo ticket no Freshdesk (máx. 5 por dia para utilizadores normais)
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $userEmail = $request->input('user_email'); // Obtém o email do campo oculto
        $today = \Carbon\Carbon::today();
        $this->ensureContactExists($user->email, $user->name);

        // Se o utilizador for admin, pode criar quantos tickets quiser
        if ($user->hasRole('admin')) {
            // Formatar a descrição antes de enviar
            $request->merge([
                'description' => "Email: {$userEmail}<br>Description: {$request->description}"
            ]);
            return $this->createTicket($request, $userEmail);
        }

        try {
            // Obter os tickets do utilizador
            $response = $this->client->get('tickets', [
                'query' => ['email' => $userEmail]
            ]);
            $ticketData = json_decode($response->getBody(), true);

            // Filtrar apenas os tickets criados hoje
            $todayTickets = collect($ticketData)->filter(function ($ticket) use ($today) {
                return \Carbon\Carbon::parse($ticket['created_at'])->isSameDay($today);
            });

            // Verificar se já atingiu o limite de 5 tickets por dia
            if ($todayTickets->count() >= 5) {
                return back()->withErrors(['error' => 'Já atingiste o limite diário de 5 tickets. Tenta novamente amanhã.']);
            }

            // Formatar a descrição antes de enviar
            $request->merge([
                'description' => "Email: {$userEmail}<br>Description: {$request->description}"
            ]);

            // Criar o ticket
            return $this->createTicket($request, $userEmail);

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocorreu um erro ao verificar os tickets: ' . $e->getMessage()]);
        }
    }

    /**
     * Função auxiliar para criar um ticket
     */
    private function createTicket(Request $request, $userEmail)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        try {
            $this->client->post('tickets', [
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
     * Lista todos os tickets (admins veem todos, utilizadores normais veem os seus próprios)
     */
    public function index()
    {
        $user = Auth::user();

        try {
            // Se for admin, busca TODOS os tickets
            if ($user->hasRole('admin')) {
                $response = $this->client->get('tickets');
            } else {
                // Se for utilizador normal, busca apenas os seus próprios tickets
                $response = $this->client->get('tickets', [
                    'query' => ['email' => $user->email]
                ]);
            }

            $tickets = json_decode($response->getBody(), true);

            return view('supporttickets.index', compact('tickets'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocorreu um erro ao obter os tickets: ' . $e->getMessage()]);
        }
    }

    /**
     * Apresenta os detalhes de um ticket (admins podem ver todos, utilizadores normais só os seus)
     */
    public function show($id)
    {
        $user = Auth::user();

        try {
            $response = $this->client->get("tickets/{$id}");
            $ticket = json_decode($response->getBody(), true);

            // Se não for admin, verifica se o ticket pertence ao utilizador autenticado
            if (!$user->hasRole('admin') && $ticket['email'] !== $user->email) {
                return back()->withErrors(['error' => 'Não tens permissão para ver este ticket.']);
            }

            return view('supporttickets.show', compact('ticket'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Ocorreu um erro ao obter os detalhes do ticket: ' . $e->getMessage()]);
        }
    }

    /**
     * Permite que um utilizador resolva o seu próprio ticket ou que um admin resolva qualquer ticket
     */
    public function resolve($id)
    {
        $user = Auth::user();

        try {
            $response = $this->client->get("tickets/{$id}");
            $ticket = json_decode($response->getBody(), true);

            // Se não for admin, verifica se o ticket pertence ao utilizador autenticado
            if (!$user->hasRole('admin') && $ticket['email'] !== $user->email) {
                return back()->withErrors(['error' => 'Não tens permissão para alterar este ticket.']);
            }

            // Atualizar o ticket para "Resolvido"
            $this->client->put("tickets/{$id}", [
                'json' => ['status' => 4] // Estado "Resolvido"
            ]);

            return back()->with('success', 'O ticket foi marcado como resolvido.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao atualizar o ticket: ' . $e->getMessage()]);
        }
    }

    public function getUserTickets($email)
    {
        try {
            $response = $this->client->get('tickets', [
                'query' => ['email' => $email]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return []; // Retorna um array vazio se houver erro
        }
    }

    private function ensureContactExists($email, $name)
    {
        try {
            $response = $this->client->get('contacts', [
                'query' => ['email' => $email],
            ]);

            $contactData = json_decode($response->getBody(), true);

            if (empty($contactData)) {
                $this->client->post('contacts', [
                    'json' => [
                        'email' => $email,
                        'name' => $name,
                    ],
                ]);
            }
        } catch (\Exception $e) {
            throw new \Exception('Erro ao garantir o contacto: ' . $e->getMessage());
        }
    }
}
