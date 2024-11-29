import './bootstrap';
import '@tabler/core/src/js/tabler.js';

//Scrpit do tema

document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const lightModeToggle = document.getElementById('light-mode-toggle');
    const darkModeToggle = document.getElementById('dark-mode-toggle');

    // ativar o modo Light
    lightModeToggle.addEventListener('click', function () {
        sidebar.setAttribute('data-bs-theme', 'light');
    });

    // ativar o modo Dark
    darkModeToggle.addEventListener('click', function () {
        sidebar.setAttribute('data-bs-theme', 'dark');
    });
});
