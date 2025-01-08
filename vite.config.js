import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'public/vendor/fontawesome-free/css/all.min.css', // Tambahkan file CSS SB Admin
                'public/css/sb-admin-2.min.css',                  // Tambahkan file CSS SB Admin
                'public/js/sb-admin-2.min.js',                    // Tambahkan file JS SB Admin
            ],
            refresh: true,
        }),
    ],
});
