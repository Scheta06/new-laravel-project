import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/active.js',
                'resources/css/index.css',
                'resources/css/styles/partials/header-footer.css',
                'resources/css/styles/main.css',
                'resources/css/styles/profile.css',
                'resources/css/styles/auth.css',
                'resources/css/styles/admin.css',],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
