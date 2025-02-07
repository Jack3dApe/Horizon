<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
#use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Wishlist;
use App\Models\Library;


class UserControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        User::updateSuspendedUsers();
        $users = User::withCount('orders')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|string|min:8|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:clients,admin',
            'is_2fa_enabled' => 'boolean'
        ]);

        $user = new User();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->phone = $validated['phone'] ?? null;

        if (!File::exists(public_path('imgs/user_profile_pics'))) {
            File::makeDirectory(public_path('imgs/user_profile_pics'), 0755, true);
        }

        if($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('imgs/user_profile_pics');
            $file->move($destinationPath, $fileName);
            $user->profile_pic = 'imgs/user_profile_pics/' . $fileName;
        }
        #$user->role = $validated['role'];
        $user->is_2fa_enabled = $validated['is_2fa_enabled'] ?? false;
        $user->status = 'Active';
        $user->save();

        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $purchasesCount = $user->libraries()->count();

        return view('users.show', compact('user', 'purchasesCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $statusOptions = ['Active', 'Suspended', 'Banned'];

        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'email' => ['required', 'email', 'max:100',
                Rule::unique('users', 'email')->ignore($user->id_user, 'id_user')
            ],
            'password' => 'nullable|string|min:8|max:255',
            'phone' => 'nullable|string|max:20',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:clients,admin',
            'status' => ['required', Rule::in($statusOptions)],
            'is_2fa_enabled' => 'boolean'
        ]);

        $user->username = $validated['username'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']); // encriptar a senha
        }

        $user->phone = $validated['phone'] ?? null;

        if (!File::exists(public_path('imgs/user_profile_pics'))) {
            File::makeDirectory(public_path('imgs/user_profile_pics'), 0755, true);
        }

        if($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('imgs/user_profile_pics');
            $file->move($destinationPath, $fileName);
            $user->profile_pic = 'imgs/user_profile_pics/' . $fileName;
        }
        #$user->role = $validated['role'];
        $user->is_2fa_enabled = $validated['is_2fa_enabled'] ?? false;
        $user->status = $validated['status'];
        $user->save();

        $user->syncRoles($validated['role']);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Remove o user
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User has been soft deleted successfully');
    }

    public function deleted()
    {
        $users = User::onlyTrashed()->paginate(10);
        return view('softdeletes.users.deleted', compact('users'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('users.deleted')->with('success', 'User restored successfully.');
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->route('users.deleted')->with('success', 'User permanently deleted.');
    }

    public function profile()
    {
        $user = Auth::user();

        $wishlistCount = Wishlist::where('id_user', $user->id_user)->count();

        $gamesOwnedCount = $user->libraries()->count();

        $games = $user->libraries()->with('game')->get();

        $genreCounts = [];
        foreach ($games as $library) {
            foreach ($library->game->genres as $genre) {
                if (!isset($genreCounts[$genre->id_genre])) {
                    $genreCounts[$genre->id_genre] = [
                        'name' => $genre->name,
                        'count' => 0,
                    ];
                }
                $genreCounts[$genre->id_genre]['count']++;
            }
        }

        // Ordenar por frequência e calcular percentagem
        $totalGenres = array_sum(array_column($genreCounts, 'count'));
        $favoriteGenres = collect($genreCounts)
            ->sortByDesc('count')
            ->take(5)
            ->map(function ($genre) use ($totalGenres) {
                $percentage = $totalGenres > 0 ? ($genre['count'] / $totalGenres) * 100 : 0;
                return [
                    'name' => $genre['name'],
                    'percentage' => round($percentage),
                ];
            })
            ->values()
            ->toArray();


        // Obter tickets do utilizador (usando o metodo público de TicketController)
        $ticketController = new TicketController();
        $tickets = $ticketController->getUserTickets($user->email);


        return view('layouts.clients.profile', compact('user', 'wishlistCount', 'gamesOwnedCount', 'games', 'favoriteGenres', 'tickets'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validações
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id_user,
            'password' => 'nullable|string|min:6|confirmed',
            'profile_pic' => 'nullable|image|max:2048',
            'phone' => 'nullable|string|max:20',
        ]);

        // Atualizar os campos
        $user->username = $request->username;
        $user->phone = $request->phone;

        // Atualizar a imagem de perfil, se fornecida
        if ($request->hasFile('profile_pic')) {
            $path = $request->file('profile_pic')->store('imgs/profile_pics', 'public');
            $user->profile_pic = $path;
        }

        // Atualizar a senha, se fornecida
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }


}
