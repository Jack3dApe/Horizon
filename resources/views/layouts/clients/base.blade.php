
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
    <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="white">

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
