import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'brand': {
          'dark': '#55080D',
          'red': '#C2174F',
          'pink': '#F982AA',
          'light': '#F8D2D6',
          'accent': '#E23030',
        },
      },
    },
  },
  plugins: [],
};
