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



