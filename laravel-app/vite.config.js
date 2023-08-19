import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    // server: {
    //     hmr: {
    //         host: 'localhost:9000',
    //     },
    // },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        // {
        //     name: 'blade',
        //     handleHotUpdate({ file, server }) {
        //         if (file.endsWith('.blade.php')) {
        //             server.ws.send({
        //                 type: 'full-reload',
        //                 path: '*',
        //             });
        //         }
        //     },
        // }
    ],
});
