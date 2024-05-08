/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'azzurro': '#DBEEEF'
            },
            fontFamily: {
                'montserrat': ['Montserrat', 'sans-serif'],
                'nunito': ['nunito', 'roboto', 'sans-serif'],
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
}

