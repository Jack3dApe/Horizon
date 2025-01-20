@extends('layouts.guests.base')
@section('title', 'Carrousel')
@section('content')
    <!-- Hero Section Begin -->
<div class="container-fluid p-0">
    <ul class="control" id="custom-control">
        <li class="prev"><i class="fas fa-angle-left fa-2x"></i></li>
        <li class="next"><i class="fas fa-angle-right fa-2x"></i></li>
    </ul>
    <div class="my-slider">
        @foreach($gamesCarrousel as $game)
            <div class="slider-item" style="position: relative;">
                <a href="{{ route('games.show.mainpage', $game->id_game) }}">

                    <div class="hero__items text-white d-flex flex-column justify-content-center align-items-start p-4" style="background-image: url('{{ asset('imgs/banners/' . $game->banner) }}'); background-size: cover; background-position: center; height: 500px;">
                        <div class="container h-100 d-flex align-items-end">
                            <div class="text-start pb-5" style="margin-left: 15vw;">
                                <!-- Gêneros dentro de caixas -->
                                <div class="d-flex flex-wrap mb-3">
                                    @foreach ($game->genres as $genre)
                                        <span class="badge text-bg-light text-uppercase fw-bold me-2" style="opacity: 0.9;">
                                        {{ $genre->name }}
                                    </span>
                                    @endforeach
                                </div>

                                <!-- Nome do Jogo -->
                                @if($game->logo)
                                    <img src="{{ asset('/imgs/logos/' . $game->logo) }}" alt="{{ $game->name }} Logo" class="img-fluid mb-4 mt-4 z-3" style="max-height: 150px; z-index: 10;">
                                @else
                                    <h2 class="text-white fw-bold mb-3" style="font-size: 2.5rem;">{{ $game->name }}</h2>
                                @endif
                            </div>
                        </div>

                        <!-- Botão "See Details" -->
                        <div class="position-absolute bottom-0 end-0 mb-3" style="margin-right: 30px;">
                            <a href="{{ route('games.show.mainpage', $game->id_game) }}"
                               class="btn btn-red btn-lg fw-bold">
                                {{__('messages.seedetails')}} <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
    <div class="container mt-4">
        <div class="row">
            <!-- Recent Games -->
            <div class="col-lg-8">
                <x-recent-games/>
            </div>
            <x-top-games/>
            <!-- Top Games -->
        </div>
    </div>
@endsection



