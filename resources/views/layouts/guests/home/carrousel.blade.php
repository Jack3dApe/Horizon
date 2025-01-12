@extends('layouts.guests.base')
@section('title', 'Carrousel')
@section('content')
<!-- Hero Section Begin -->
<div class="container">
    <ul class="control" id="custom-control">
        <li class="prev"><i class="fas fa-angle-left fa-2x"></i></li>
        <li class="next"><i class="fas fa-angle-right fa-2x"></i></li>
    </ul>
    <div class="my-slider">
        @foreach($gamesCarrousel as $game)
            <a href="{{ route('games.show.mainpage', $game->id_game) }}">
                <img src="{{ asset('imgs/banners/' . $game->banner) }}" alt="{{ $game->name }}">
            </a>
        @endforeach
    </div>
</div>


@endsection
