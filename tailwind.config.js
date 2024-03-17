/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
module.exports = {
    darkMode: 'class',
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors:{
                'brand-r':'#B80404',
                'brand-b':'#282373',
                'brand-bb':'#022334',
                'brand-c':'#00FF79',
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            }
        },
        fontFamily:{
            'sans': ['Nunito','ui-sans-serif', 'system-ui'],
        }
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
