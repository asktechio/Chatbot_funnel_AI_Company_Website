import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'brand-teal': '#39C6C8',
                'brand-blue': '#5B79C9',
                'brand-violet': '#9A3DB8',
                primary: {
                    50: '#F0F3FA',
                    100: '#DDE4F3',
                    200: '#B8C5E6',
                    300: '#93A6D9',
                    400: '#7390CF',
                    500: '#5B79C9',
                    600: '#4A63AF',
                    700: '#3C5095',
                    800: '#30407A',
                    900: '#243060',
                },
                secondary: {
                    600: '#475569',
                    700: '#334155',
                },
                accent: {
                    500: '#9A3DB8',
                },
            },
        },
    },
    plugins: [],
};
