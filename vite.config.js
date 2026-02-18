import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/business/institute/themes/classic/app.css',
                'resources/css/business/tours/themes/modern/app.css',
                'resources/css/business/tours/themes/classic/app.css',
                'resources/js/app.js',
                'resources/css/filament/tours-admin/theme.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
