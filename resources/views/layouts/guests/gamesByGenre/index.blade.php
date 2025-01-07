@extends('layouts.guests.base')

@section('title', "Games in $genre->name")

@section('content')
    <div class="container">
        <h1>Games in {{ $genre->name }}</h1>
        @if($games->count() > 0)
            <div class="row">
                @foreach($games as $game)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset('storage/'.$game->icon) }}" class="card-img-top" alt="{{ $game->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $game->name }}</h5>
                                <p class="card-text">${{ $game->price }}</p>
                                <a href="{{ route('games.show', $game->id_game) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                {{ $games->links() }}
            </div>
        @else
            <p>No games found in this genre.</p>
        @endif
    </div>
@endsection
