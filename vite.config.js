import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
    ],
    build: {
        minify: false,        // <-- disable minification
        sourcemap: true,      // <-- enable source maps for easier debugging
    },
    define: {
        'process.env.NODE_ENV': '"development"',
    },      
});
