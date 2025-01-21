<header class="header " style="margin-bottom: -12px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 d-lg-none d-flex justify-content-between align-items-center mb-3 mt-1">
                <!-- Dropdown Menu (Hambúrguer) -->
                <div class="dropdown" style="color: white;">
                    <button class="btn btn-outline-dark" type="button" id="mobileMenuDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="mobileMenuDropdown" style="color: white;">
                        <li><a href="{{ route('home') }}" class="dropdown-item">{{ __('messages.homepage') }}</a></li>
                        <li>
                            <a href="#" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">{{ __('messages.genres') }}</a>
                            <ul class="dropdown-menu">
                                @foreach($genres as $genre)
                                    <li><a href="{{ route('genres.games', $genre->id_genre) }}" class="dropdown-item">{{ $genre->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="#" class="dropdown-item">{{ __('messages.aboutus') }}</a></li>
                        <li><a href="#" class="dropdown-item">{{ __('messages.support') }}</a></li>
                    </ul>
                </div>

                <!-- Logo Centralizada -->
                <a href="{{ route('home') }}" class="mx-auto">
                    <img src="{{ asset('imgs/logo_horizon_text2.png') }}" alt="Logo" class="img-fluid" style="max-width: 120px;">
                </a>

                <!-- Menu de Usuário e Idioma -->
                <div class="d-flex align-items-center" >
                    <!-- User Dropdown -->
                    <div class="nav-item dropdown me-3" >
                        <a style="color: white;" href="#" class="nav-link p-0" data-bs-toggle="dropdown" aria-expanded="false" >
                            <i class="fa-regular fa-user fa-lg text-light " ></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="min-width: 200px;">
                            @guest
                                <a href="{{ route('login') }}" class="dropdown-item d-flex align-items-center">
                                    <i class="fa-solid fa-right-to-bracket me-2"></i>
                                    <span>Login</span>
                                </a>
                                <a href="{{ route('register') }}" class="dropdown-item d-flex align-items-center">
                                    <span class="fa-solid fa-user-plus me-2"></span> Sign Up
                                </a>
                            @endguest

                            @auth
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <i class="fa-solid fa-user me-2"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item d-flex align-items-center">
                                    <i class="fa-solid fa-heart me-2"></i> Wishlist
                                </a>
                                @if(auth()->user()->hasRole('admin'))
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item d-flex align-items-center">
                                        <i class="fa-solid fa-chart-line me-2"></i> Dashboard
                                    </a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center" style="background: none; border: none;">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>

                    <!-- Language Switch -->
                    <x-language-switch />
                </div>
            </div>















            <!-- Desktop Navigation -->
            <div class="row align-items-center d-none d-lg-flex">

                <div class="col-6 col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('imgs/logo_horizon_text2.png') }}" alt="Logo" class="img-fluid w-60">
                        </a>
                    </div>
                </div>


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
                        <a href="#" class="search-switch"><span class="icon_search" ></span></a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                                <span class="avatar avatar-sm" style="color: white;"><i class="fa-regular fa-user"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" data-bs-theme="light" style="min-width: 200px;">
                                @guest
                                    <a href="{{ route('login') }}" class="dropdown-item d-flex align-items-center" style="color:black;">
                                        <i class="fa-solid fa-right-to-bracket me-2"></i>
                                        <span>Login</span>
                                    </a>
                                    <a href="{{ route('register') }}" class="dropdown-item d-flex align-items-center" style="color:black;">
                                        <i class="fa-solid fa-user-plus me-2"></i>
                                        <span>Sign Up</span>
                                    </a>
                                @endguest

                                @auth
                                    <a href="#" class="dropdown-item d-flex align-items-center" style="color:black;">
                                        <i class="fa-solid fa-user me-2"></i>
                                        <span>Profile</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item d-flex align-items-center" style="color:black;" >
                                        <i class="fa-solid fa-heart me-2" ></i>
                                        <span>Wishlist</span>
                                    </a>
                                    @if(auth()->user()->hasRole('admin'))
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item d-flex align-items-center" style="color:black;">
                                            <i class="fa-solid fa-chart-line me-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center" style="background: none; border: none;">
                                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>

                        <x-language-switch />
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
