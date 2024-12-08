
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
    <!-- Sidebar -->
    <aside class="navbar navbar-vertical navbar-expand-lg custom-sidebar" data-bs-theme="light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark">
                <a href=".">
                    <img src="{{asset('imgs/logo_horizon.png')}}" width="200" height="200" alt="Horizon">
                </a>
            </h1>

            <div class="collapse navbar-collapse" id="sidebar-menu">

                <ul class="navbar-nav pt-lg-3">
                    <!-- Logout Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-logout fs-5"></i>
                            </span>
                            <span class="nav-link-title">
                                Log Out
                            </span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                            @csrf
                        </form>
                    </li>

                    <!-- Home Link -->
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <i class="ti ti-home fs-5"></i>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>





                    <!-- Theme Section -->


                </ul>
            </div>
            <div class="theme-toggle mt-auto mb-4 px-3 d-flex justify-content-center">
                <button class="btn nav-link p-0 me-3" id="light-mode-toggle">
                    <i class="ti ti-sun fs-3" title="Light Mode"></i>
                </button>
                <button class="btn nav-link p-0" id="dark-mode-toggle">
                    <i class="ti ti-moon fs-3" title="Dark Mode"></i>
                </button>
            </div>
        </div>
    </aside>
    <!-- Main Content -->

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
                    <p>Horizon 2024 - All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Libs JS -->
@vite(['resources/js/app.js']);
</body>
</html>
