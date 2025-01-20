<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"> {{--Adicionei para o butao da wishlist --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icons/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('icons/favicon-192x192.png')}}">
    {{--Aple--}}
    <link rel="apple-touch-icon" href="{{asset('icons/apple-touch-icon.png')}}">

    <link rel="manifest" href="{{asset('icons/site.webmanifest')}}">

    <title>Horizon</title>
    <!-- CSS files -->
    @vite(['resources/sass/guest.scss'])
</head>
<body style="min-height: 100vh; display: flex; flex-direction: column">
<main class="main" id="top" style="flex-grow: 1">


    @include('layouts.guests.parts.navbarGuest')

    @include('layouts.guests.parts.menu')

    @yield('content')

</main>
@include('layouts.guests.parts.footerGuest')

<!-- Libs JS -->
@vite(['resources/js/guest.js'])
</body>
</html>
