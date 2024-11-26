{{--Navegação--}}
<nav class="d-flex navbar navbar-expand-md darkNav navbar-dark">
    <!-- Toggler/collapsibe Button -->
    <span class="d-md-none d-block" style="cursor:pointer" onclick="openNav()"><img width="30px" height="30px" src="https://icon-library.com/images/hamburger-menu-icon-png-white/hamburger-menu-icon-png-white-10.jpg"></span>

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img width="30px" height="30px" src="https://icon-library.com/images/hamburger-menu-icon-png-white/hamburger-menu-icon-png-white-10.jpg"></a>
        <div class="overlay-content">
            <ul class="navbar-nav pl-4 pt-1">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        Store
                    </a>
                    <div style="background-color: #171a21;" class="dropdown-menu">
                        <a class="menuItem" href="#">Home</a>
                        <a class="menuItem" href="#">Discovery Queue</a>
                        <a class="menuItem" href="#">Wishlist</a>
                        <a class="menuItem" href="#">Points Shop</a>
                        <a class="menuItem" href="#">News</a>
                        <a class="menuItem" href="#">Stats</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Support</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">Account</a>

                    <div style="background-color: #171a21;" class="dropdown-menu">
                        <a class="menuItem" href="#">Login</a>
                        <a class="menuItem" href="#">Sign Up</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
