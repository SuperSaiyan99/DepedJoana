import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

export default defineConfig({
    server: {
        host: true, // set false for local dev
        https: {
            key: fs.readFileSync('/path-to-your-ssl-key.pem'),
            cert: fs.readFileSync('/path-to-your-ssl-cert.pem'),
        },
        hmr: {
            host: 'https://18e9-216-247-37-161.ngrok-free.app', //ngrok link
        }
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/app.scss'
            ],
            refresh: true,
        }),
    ],
});
