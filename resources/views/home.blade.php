@extends('layouts.guests.base')
@section('title', 'Home')

@section('content')
    @include('layouts.guests.home.carrousel', ['gamesCarrousel' => $gamesCarrousel])
    <x-top-games />
@endsection
