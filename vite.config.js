import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import legacy from '@vitejs/plugin-legacy';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
        legacy({
            targets: ['safari >= 13', 'ios >= 13', 'chrome >= 80', 'firefox >= 78'],
            additionalLegacyPolyfills: ['regenerator-runtime/runtime'],
        }),
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
    build: {
        target: ['es2015', 'safari13'],
    },
});