import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#0D5E24',
                'primary-light': '#2F9E44',
                forest: '#0B6B2E',
                'forest-deeper': '#06421a',
                secondary: '#8B4E1E',
                gold: '#C67A2B',
                palm: '#84CC16',
                olive: '#6B8E23',
                cream: '#FDF8EE',
                beige: '#EED9B7',
                charcoal: '#1F2937',
                slate: '#4B5563',
            },
            borderRadius: {
                'btn': '12px',
                'card': '20px',
                'input': '12px',
                'image': '18px',
                'modal': '24px',
            },
            boxShadow: {
                'card': '0 10px 30px rgba(0, 0, 0, 0.08)',
                'hero': '0 20px 60px rgba(0, 0, 0, 0.12)',
                'dropdown': '0 8px 20px rgba(0, 0, 0, 0.10)',
            },
            maxWidth: {
                'container': '1280px',
                'content': '760px',
            },
            spacing: {
                'section': '120px',
                'section-md': '80px',
                'section-sm': '60px',
            },
        },
    },

    plugins: [forms],
};
