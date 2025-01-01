@extends('layouts.admin.base')

@section('title', 'Deleted Games')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col mb-3 d-flex justify-content-between">
                <h1>Deleted Games</h1>
                <a href="{{ route('games.index') }}" class="btn btn-primary">Back to Games</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-secondary">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" value="10" size="3"
                                   aria-label="Number of entries">
                        </div>
                        Records
                    </div>
                    <div class="ms-auto text-secondary">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm" size="30" aria-label="Search games">
                        </div>
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
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                       aria-label="Select game"></td>
                            <td>{{ $game->id }}</td>
                            <td>{{ $game->title }}</td>
                            <td>{{ $game->genre->name ?? 'N/A' }}</td>
                            <td>{{ $game->publisher->name ?? 'N/A' }}</td>
                            <td>{{ $game->deleted_at->format('m/d/Y') }}</td>
                            <td class="text-end">
                                {{-- Restore Button --}}
                                <form action="{{ route('games.restore', $game->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Restore</button>
                                </form>

                                {{-- Force Delete Button --}}
                                <form action="{{ route('games.forceDelete', $game->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Permanently delete this game?')">Force Delete</button>
                                </form>
                            </td>
                        </tr>
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
