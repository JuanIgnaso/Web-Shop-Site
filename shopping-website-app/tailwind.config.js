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
                'turquoiseMediumDark':'#256664',
                'turquoiseMedium':'#2b7a77',
                'turquoiseSemiLight':'#3aafa9',
                'turquoiseLight':'#def2f1',
                'turquoiseWhite':'#feffff',
                'darkBlue':'#32608E',
                'darkOrange':'#E39005'
            },
            keyframes: {
                wiggle: {
                    '0%, 100%': { transform: 'rotate(-3deg)' },
                    '50%': { transform: 'rotate(3deg)' },
                  }
            },
            animation: {
                'fadeSlow': 'wiggle 3s linear infinite',
            }

        },

    },

    plugins: [
        require('@tailwindcss/forms'),
        forms
    ],
};
