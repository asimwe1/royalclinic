import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
                urbanist: ['Urbanist', 'sans-serif'],
            },
            colors: {
                clinic: {
                    navy: '#10244B',
                    royal: '#2563EB',
                    slate: '#93A0AF',
                    light: '#F8F9FA',
                },
            },
        },
    },
    plugins: [],
};
