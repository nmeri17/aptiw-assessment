import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
    alias: [
      /*{ find: '@', replacement: 'node_modules' }*//*,
      { find: 'pages', replacement: '/resources/js/pages' },
      { find: 'components', replacement: '/resources/js/components' },*/
    ]
  }
});
