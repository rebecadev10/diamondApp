import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/fullCalendar.js',

                
            ],
            // refresh: true,
            hotFile: 'storage/vite.hot', // Customize the "hot" file...
            buildDirectory: 'bundle', // Customize the build directory...
            // server: { 
            //     hmr: {
            //         host: 'https://diamond.test',
            //     },
            // }, 
        }),
        
    ],
    build: {
        manifest: 'assets.json', // Customize the manifest filename...
      },
});
