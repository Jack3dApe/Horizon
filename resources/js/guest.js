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
    const gameId = wishlistBtn.dataset.gameId;

    wishlistBtn.addEventListener('click', () => {
        // Faz o toggle da wishlist
        fetch(`/wishlist/${gameId}/toggle`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
            .then(response => {
                if (response.redirected) {
                    // Redireciona para login se o usuário não está autenticado
                    window.location.href = response.url;
                    return;
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'added') {
                    // Atualiza o botão para "adicionado"
                    heartIcon.classList.replace('fa-heart-o', 'fa-heart');
                    wishlistBtn.textContent = 'Wishlisted';
                    gsap.fromTo(heartIcon, { scale: 0.8 }, { scale: 1.2, duration: 0.3 });
                } else if (data.status === 'removed') {
                    // Atualiza o botão para "removido"
                    heartIcon.classList.replace('fa-heart', 'fa-heart-o');
                    wishlistBtn.textContent = 'Add to Wishlist';
                    gsap.to(heartIcon, { scale: 1, duration: 0.2 });
                }
            })
            .catch(error => {
                console.error('Error toggling wishlist:', error);
            });
    });
});



//Template



