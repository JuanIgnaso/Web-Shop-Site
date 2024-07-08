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
                'darkOrange':'#E39005',

                //Colore vivos???
                'verdeAlga':'#90e0bb',
                'azulDianne':'#225f6a',
                'neonNaranja':'#ff9833',
                'azulMargarita':'#696ac8',
                'rosaPersa':'#f184c0',
                'marronCacao':'#261e1b',
                'arbolCoral':'#af6d6b',
                'azulRaro':'#005099',
                //
                //Cafetería
                'linen':'#fcf8ef', //blanco o beige muy claro
                'sandrift':'#ad9279', //tono café
                'shingleFawn':'#795037', //tono café oscuro/chocolate
                'eternity':'#1c110b', //marrón casi negro
                'dixie':'#e7a21c', //naranja medio oscuro
                'coldPurple':'#afa6df', //violeta
                'salomie':'#fdd788', //amarillo pálido
                'lochinvar':'#349184' //verde azulado, turquesa oscuro quizás
                //
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
