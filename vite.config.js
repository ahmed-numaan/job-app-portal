import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'Modules/JobsSite/resources/assets/js/app.js',        // JobsSite JS
                'Modules/JobsSite/resources/assets/css/app.css',      // JobsSite CSS
                'Modules/AdminSite/resources/assets/js/admin.js',     // AdminSite JS
                'Modules/AdminSite/resources/assets/css/admin.css',   // AdminSite CSS
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@JobsSite': path.resolve(__dirname, 'Modules/JobsSite/resources/assets/js'),
            '@AdminSite': path.resolve(__dirname, 'Modules/AdminSite/resources/assets/js'),
        },
    },
});
