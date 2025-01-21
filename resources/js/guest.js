import './bootstrap';
import './theme.js'
import './bootstrap-navbar.js'
import './top-games.js'

//Carrousel
import { tns } from 'tiny-slider/src/tiny-slider';
import 'tiny-slider/dist/tiny-slider.css';

// Inicializa o Tiny Slider
document.addEventListener('DOMContentLoaded', function () {
    const slider = tns({
        container: '.my-slider',
        items: 1,
        slideBy: 'page',
        autoplay: true,
        controls: true,
        nav: false,
        controlsContainer: '#custom-control',
        prevButton: '.prev',
        nextButton: '.next',
        speed: 500,
        autoplayButtonOutput: false,
    });
});



// Butao de adicionar a wishlist
import { gsap } from "gsap";

document.addEventListener('DOMContentLoaded', function () {
    const wishlistBtn = document.getElementById('wishlist-btn');
    const heartIcon = document.getElementById('heart-icon');

    wishlistBtn.addEventListener('click', () => {
        const id_game = wishlistBtn.getAttribute('data-id-game');
        const toggleUrl = `/wishlist/${id_game}/toggle`;

        // Verifica se o usuário está autenticado
        fetch('/check-auth', {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                if (!data.authenticated) {
                    // Manda para o login se n tiver logado
                    window.location.href = '/login';
                    return;
                }

                // altera o estado da wishlist
                fetch(toggleUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id_game })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'added') {
                            heartIcon.classList.replace('fa-heart-o', 'fa-heart'); // Altera ícone para "coração cheio"
                            wishlistBtn.innerHTML = `<i id="heart-icon" class="fa fa-heart"></i> Wishlisted`;
                            gsap.fromTo(heartIcon, { scale: 0.8 }, { scale: 1.2, duration: 1 });
                        } else if (data.status === 'removed') {
                            heartIcon.classList.replace('fa-heart', 'fa-heart-o'); // Altera ícone para "coração vazio"
                            wishlistBtn.innerHTML = `<i id="heart-icon" class="fa fa-heart-o"></i> Add to Wishlist`;
                            gsap.to(heartIcon, { scale: 1, duration: 1 });
                        }
                    })
                    .catch(error => console.error('Error toggling wishlist:', error));
            })
            .catch(error => console.error('Error checking authentication:', error));
    });
});




//Template

//Language Dropdown
document.addEventListener('DOMContentLoaded', function () {
    const languageSwitch = document.getElementById('languageSwitch');
    const dropdown = languageSwitch.querySelector('.language-dropdown');

    document.addEventListener('click', function (event) {
        if (!languageSwitch.contains(event.target)) {
            dropdown.style.display = 'none';
        } else {
            dropdown.style.display = dropdown.style.display === 'flex' ? 'none' : 'flex';
        }
    });
});



