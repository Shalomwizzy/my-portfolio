import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js','resources/js/mode.js','resources/js/welcome.js',
                'resources/css/nav.css','resources/css/mode.css','resources/css/app.css','resources/css/welcome.css',
                'resources/css/projects.css','resources/css/skills.css','resources/css/learning.css','resources/css/contact-me.css','resources/css/admin-nav.css',
            ],
            refresh: true,
        }),
    ],
});
