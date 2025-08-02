import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // <--- ADD THIS LINE to enable dark mode based on class
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans], // <--- CHANGE 'Figtree' to 'Inter'
            },
        },
    },

    plugins: [
        forms, // Make sure forms plugin is here if you use it
        require('@tailwindcss/typography'),
    ],
};