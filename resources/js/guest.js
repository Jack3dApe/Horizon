import './bootstrap';
import './theme.js'
import './bootstrap-navbar.js'

//Carrousel
import { tns } from 'tiny-slider/src/tiny-slider';
import 'tiny-slider/dist/tiny-slider.css';

// Inicializa o Tiny Slider
document.addEventListener('DOMContentLoaded', function () {
    const slider = tns({
        container: '.my-slider',
        items: 1, // Mostrar um item por vez
        slideBy: 'page', // Avançar por página
        autoplay: true, // Habilitar autoplay
        autoplayButtonOutput: false, // Desativar botão de autoplay
        controls: true, // Ativar controles
        controlsContainer: '#custom-control', // Usar controles personalizados
        prevButton: '.prev', // Botão anterior
        nextButton: '.next', // Botão próximo
        nav: true, // Mostrar botões de navegação
        navPosition: 'bottom', // Posição dos botões de navegação
        fixedWidth: false,
        speed: 400, // Velocidade de transição
        responsive: {
            640: { items: 1 },
            768: { items: 1 },
            1024: { items: 1 },
        },
    });
});


//Template



