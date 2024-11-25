import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',//admins e clientes - @vite(['resources/sass/app.scss'])
                'resources/js/app.js',//Admins e clientes
                'resources/js/guests.js',//Guests
                'resources/sass/guests.scss',//guests
            ],
            refresh: true,
        }),
    ],
});
