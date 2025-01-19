
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('imgs/logo_horizon_text2.png') }}" alt="Logo" class="img-fluid w-85">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
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
            <div class="col-lg-2">
                <div class="header__right d-flex align-items-center justify-content-end">
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
                    <x-language-switch />
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
