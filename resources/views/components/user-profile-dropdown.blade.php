@if(auth()->check())
    <!-- Dropdown do Usuário Logado -->
    <div class="dropdown">
        <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Foto de Perfil -->
            <img
                src="{{ auth()->user()->profile_pic ? asset(auth()->user()->profile_pic) : asset('imgs/noProfilePic.jpg') }}"
                alt="Profile Picture"
                class="rounded-circle me-2"
                style="width: 32px; height: 32px;"
            >
            <!-- Nome do Usuário -->
            <span>{{ auth()->user()->username }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
            <li><a class="dropdown-item" href="#">Gestão de Perfil</a></li>
            <li><a class="dropdown-item" href="#">Wishlist</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </div>
@else
    <!-- Botões para Login e Register -->
    <div class="d-flex align-items-center">
        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
    </div>
@endif
