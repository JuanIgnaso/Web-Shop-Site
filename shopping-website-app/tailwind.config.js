import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {

        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'turquoiseDark':'#17242a',
                'turquoiseMedium':'#2b7a77',
                'turquoiseSemiLight':'#3aafa9',
                'turquoiseLight':'#def2f1',
                'turquoiseWhite':'#feffff'
            },
        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        forms
    ],
};
