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
                // Legacy brand colors (kept for backward-compat)
                'brand-teal': '#39C6C8',
                'brand-blue': '#5B79C9',
                'brand-violet': '#9A3DB8',
                // Premium dark design system
                'deep-blue': '#0A2540',
                'deep-blue-mid': '#0D2E4E',
                'deep-blue-light': '#1a3a5c',
                'cyan-accent': '#00D4FF',
                'cyan-soft': '#33DEFF',
                primary: {
                    50: '#E6F7FF',
                    100: '#BAE8FF',
                    200: '#7DD4F5',
                    300: '#38BFF0',
                    400: '#00AEDD',
                    500: '#00D4FF',
                    600: '#00A8D4',
                    700: '#0082A8',
                    800: '#005E7A',
                    900: '#003A4E',
                },
                secondary: {
                    600: '#475569',
                    700: '#334155',
                },
                accent: {
                    500: '#00D4FF',
                },
            },
            backgroundImage: {
                'hero-gradient': 'linear-gradient(135deg, #0A2540 0%, #0D2E4E 50%, #0A1A2E 100%)',
                'cta-gradient': 'linear-gradient(135deg, #00D4FF 0%, #0082A8 50%, #0A2540 100%)',
                'card-gradient': 'linear-gradient(135deg, rgba(0,212,255,0.08) 0%, rgba(10,37,64,0.6) 100%)',
            },
            boxShadow: {
                'glow-cyan': '0 0 20px rgba(0, 212, 255, 0.25), 0 4px 24px rgba(0, 0, 0, 0.3)',
                'glow-blue': '0 0 20px rgba(10, 37, 64, 0.5), 0 4px 24px rgba(0, 0, 0, 0.4)',
                'glass': '0 8px 32px rgba(0, 0, 0, 0.3), 0 1px 0 rgba(255,255,255,0.05) inset',
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.6s ease forwards',
                'fade-in': 'fadeIn 0.5s ease forwards',
                'float': 'float 6s ease-in-out infinite',
                'glow-pulse': 'glowPulse 3s ease-in-out infinite',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-12px)' },
                },
                glowPulse: {
                    '0%, 100%': { boxShadow: '0 0 20px rgba(0, 212, 255, 0.2)' },
                    '50%': { boxShadow: '0 0 40px rgba(0, 212, 255, 0.5)' },
                },
            },
        },
    },
    plugins: [],
};
