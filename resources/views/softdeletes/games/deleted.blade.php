@extends('layouts.admin.base')

@section('title', 'Deleted Games')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-end">
                <a href="{{ route('games.index') }}" class="btn btn-primary">Back to Games</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="ms-auto text-secondary">
                        <!-- Formulário de pesquisa -->
                        <form action="{{ route('deleted.games.search') }}" method="GET" class="d-inline-block">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" name="query" value="{{ $query ?? '' }}" class="form-control form-control-sm"
                                       size="30" aria-label="Search deleted games">
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
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Publisher</th>
                        <th>Deleted At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($games as $game)
                        @if ($game->deleted_at)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                           aria-label="Select game"></td>
                                <td>{{ $game->id_game }}</td>
                                <td>{{ $game->name }}</td>
                                <td>
                                    <x-game-genres :genres="$game->genres" />
                                </td>
                                <td>{{ $game->publisher->name ?? 'Not Available' }}</td>
                                <td>{{ $game->deleted_at ? $game->deleted_at->format('m/d/Y') : 'N/A' }}</td>
                                <td class="text-end">
                                    {{-- Restore Button --}}
                                    <form action="{{ route('games.restore', $game->id_game) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Restore</button>
                                    </form>

                                    {{-- Force Delete Button --}}
                                    <form action="{{ route('games.forceDelete', $game->id_game) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Permanently delete this game?')">Force Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                {{ $games->links('layouts.admin.parts.paginationGame', ['games' => $games]) }}
            </div>
        </div>
    </div>
@endsection
