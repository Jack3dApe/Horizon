
<header class="header" style="margin-bottom: -12px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('imgs/logo_horizon_text2.png') }}" alt="Logo" class="img-fluid w-60" >
                    </a>
                </div>
            </div>

            <!-- Desktop Navigation -->
            <div class="col-lg-8 d-none d-lg-block">
                <div class="header__nav">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">{{__('messages.homepage')}}</a></li>
                            <li>
                                <a href="#">{{__('messages.genres')}} <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    @foreach($genres as $genre)
                                        <li><a href="{{ route('genres.games', $genre->id_genre) }}">{{ $genre->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">{{__('messages.aboutus')}}</a></li>
                            <li><a href="#">{{__('messages.support')}}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-6 col-lg-2 d-lg-none text-end">
                <button id="burger-menu-toggle" class="burger-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>


            <div class="col-lg-2 d-flex align-items-center justify-content-end">
                <div class="header__right d-flex align-items-center justify-content-end">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <div class="dropdown-menu dropdown-menu-demo">
                        <a href="{{ route('login') }}"><span class="icon_profile"></span>
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
                        </a>


                        <x-language-switch />
                    </div>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
