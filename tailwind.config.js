const defaultTheme = require('tailwindcss/defaultTheme');
const forms = require('@tailwindcss/forms');
const flowbitePlugin = require('flowbite/plugin');

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './node_modules/flowbite/**/*.js'
  ],
  darkMode: 'class', // Aktifkan dark mode menggunakan class
  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        primary: '#FF7F11', // Orange Laravel
        dark: '#1E293B', // Warna background untuk dark mode
        light: '#F8FAFC', // Warna background untuk light mode
        textDark: '#E5E7EB', // Warna teks untuk dark mode
        textLight: '#1F2937', // Warna teks untuk light mode
      },
    },
  },
  plugins: [
    forms,
    flowbitePlugin,
  ],
};
