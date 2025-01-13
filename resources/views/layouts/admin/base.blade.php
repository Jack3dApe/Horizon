
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="shortcut icon" href="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icons/favicon-16x16.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('icons/favicon-192x192.png')}}">
    {{--Aple--}}
    <link rel="apple-touch-icon"  href="{{asset('icons/apple-touch-icon.png')}}">

    <link rel="manifest" href="{{asset('icons/site.webmanifest')}}">

    <title>Horizon-Admin</title>
    <!-- CSS files -->
    @vite(['resources/sass/app.scss']);
</head>
<body class="layout-fluid">
<div class="page">
    <!-- Sidebar -->
    <aside class="navbar navbar-vertical navbar-expand-lg custom-sidebar" data-bs-theme="dark" style="background: #141414;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
                <a href="{{ route('home') }}">
                    <img src="{{asset('imgs/logo_horizon_text2.png')}}" width="200" height="200" alt="Horizon">
                </a>
            </h1>

            <div class="collapse navbar-collapse" id="sidebar-menu">

                <ul class="navbar-nav pt-lg-3">
                    <!-- Home Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span  class="nav-link-icon d-md-none d-lg-inline-block"  >
                                <i class="ti ti-home fs-5" style="color: #A6BCBC;" ></i>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>

                    <!-- Admin Overview -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.overview') }}">
                            <span  class="nav-link-icon d-md-none d-lg-inline-block"  >
                                <i class="ti ti-planet fs-5" style="color: #A6BCBC;"></i>
                            </span>
                            <span class="nav-link-title">
                                Overview
                            </span>
                        </a>
                    </li>

                    <!-- Games Section -->
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#admin-menu" data-bs-toggle="dropdown"
                           data-bs-auto-close="false" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-device-gamepad-2" style="color: #A6BCBC;"></i>
                            </span>
                            <span class="nav-link-title">
                               Games
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="{{route('genres.index')}}">Genres</a>
                            <a class="dropdown-item active" href="{{route('publishers.index')}}">Publishers</a>
                            <a class="dropdown-item active" href="{{route('games.index')}}">All Games</a>
                        </div>
                    </li>


                    <!-- Users Section -->
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#admin-menu" data-bs-toggle="dropdown"
                           data-bs-auto-close="false" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-users" style="color: #A6BCBC;" ></i>
                            </span>
                            <span class="nav-link-title">
                               Users
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="{{route('users.index')}}">Accounts</a>
                            <a class="dropdown-item active" href="{{route('reviews.index')}}">Reviews</a>
                        </div>
                    </li>
                    <!-- Restore Section -->
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#admin-menu" data-bs-toggle="dropdown"
                           data-bs-auto-close="false" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-users" style="color: #A6BCBC;"></i>
                            </span>
                            <span class="nav-link-title">
                               Restore/Final-Delete
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item active" href="{{route('users.deleted')}}">Accounts</a>
                            <a class="dropdown-item active" href="{{route('reviews.deleted')}}">Reviews</a>
                            <a class="dropdown-item active" href="{{route('support_tickets.deleted')}}">Support Tickets</a>
                            <a class="dropdown-item active" href="{{route('publishers.deleted')}}">Publishers</a>
                            <a class="dropdown-item active" href="{{route('games.deleted')}}">Games</a>
                            <a class="dropdown-item active" href="{{route('genres.deleted')}}">Genres</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- Main Content -->
    <div class="page-wrapper">
        {{--Page Header --}}
        <div class="page-header d-print-none">
            <div class="d-flex align-items-center justify-content-between mx-3">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">Admin - {{ auth()->user()->username }}</div>
                            <h2 class="page-title">@yield('title')</h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                {{--Botões de açao da página--}}
                            </div>
                        </div>
                    </div>
                </div>
                <x-user-profile-dropdown />
            </div>

        </div>
        {{--Page Body--}}
        <div class="page-body">
            <div class="container-xl">
                @yield('content')
            </div>
        </div>
        {{--Footer--}}
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl"></div>
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col">
                    <p></p>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Libs JS -->
@vite(['resources/js/app.js'])
@stack('scripts')
</body>
</html>
