<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Horizon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">


            </ul>
        </div>
    </div>
</nav>
-->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('imgs/logo_horizon_text2.png') }}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="#">Homepage</a></li>
                            <li>
                                <a href="#">Genres <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @foreach($genres as $genre)
                                        <li><a href="{{ route('genres.games', $genre->id_genre) }}">{{ $genre->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <a href="{{ route('login') }}"><span class="icon_profile"></span></a>
                    @auth
                        @if(auth()->user()->hasRole('admin'))
                            <a href="{{ route('admin.dashboard') }}"><span class="icon_desktop"></span></a>
                        @endif
                    @endauth
                    @auth
                        @if(auth()->user()->hasRole('clients'))
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: white;">
                                    <span class="icon_error-triangle_alt"></span>
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
