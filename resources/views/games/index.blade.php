@extends('layouts.admin.base')
@section('title', 'Game List')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{ route('games.create') }}" class="btn btn-primary">Create New Game</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">
                        <form action="{{ route('admin.search.games') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search game">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                    <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                               aria-label="Select all"></th>
                        <th class="w-1">ID</th>
                        <th>Name</th>
                        <th>Publisher</th>
                        <th>Genre</th>
                        <th>Price</th>
                        <th>Rating</th>
                        <th>Release Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($games as $game)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select game"></td>
                            <td><span class="text-secondary">{{ $game->id_game }}</span></td>
                            <td><a href="{{ route('games.show', $game->id_game) }}" class="text-reset"
                                   tabindex="-1">{{ $game->name }}</a></td>
                            <td>{{ $game->publisher->name ?? 'Not Available' }}</td>
                            <td>
                                <x-game-genres :genres="$game->genres" />
                            </td>
                            <td>${{ number_format($game->price, 2) }}</td>
                            <td><x-game-rating :game="$game" /></td>
                            <td>{{ $game->release_date->format('m/d/Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('games.show', $game->id_game) }}" class="btn btn-info"><i class="ti ti-eye"></i></a>
                                <a href="{{ route('games.edit', $game->id_game) }}" class="btn btn-warning"><i class="ti ti-pencil" aria-hidden="true"></i></a>
                                <form action="{{ route('games.destroy', $game->id_game) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to soft delete this game?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No games found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $games->links('layouts.admin.parts.paginationGame', ['games' => $games]) }}
            </div>
        </div>
    </div>
@endsection
