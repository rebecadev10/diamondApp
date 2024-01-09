import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                azul:{
                    'claro': '#1D92CC',
                    'normal': '#0E085E',
                    'plomo':'#213242',
                    'transparente':'44b5ed89',
                },
                'amarillo':'#E0AA2E',
                'blanco':'#ffffff',
                'negro':'#000000',
                'fondoClaro':'#FCFCF7',
                'ceramic':'#FEFFFA',
                'gris':'#777777'
            },
            gridTemplateRows:{
                'layoutForm':'0.3fr,1fr'
            },
        },
    },

    plugins: [forms, typography],
};
