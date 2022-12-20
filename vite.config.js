import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({

            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'public/css/mobile_bottom_menu.css',
                'public/css/tovar_page_content.css',
                'public/css/tovar_card.css',
                'public/css/tovar_filter.css',
                'public/css/popup.css',
                'public/css/pagination.css',
                'public/css/cart.css',
                'public/css/main.css',

                'public/js/sliders.js',
                'public/js/mainsearch.js',
                'public/js/cart.js',
            ],
            refresh: true,
        }),
    ],
});
