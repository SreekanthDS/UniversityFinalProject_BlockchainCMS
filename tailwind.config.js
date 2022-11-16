const defaultTheme = require('tailwindcss/defaultTheme');
const percentageWidth = require('./resources/js/plugins/tailwindcss-percentage-width');
const percentageLeft = require('./resources/js/plugins/tailwindcss-percentage-left');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require("@tailwindcss/typography"),
        require('daisyui'),
        percentageWidth,
        percentageLeft
    ],

    // daisyUI config (optional)
    daisyui: {
        styled: true,
        base: true,
        utils: true,
        logs: true,
        rtl: false,
        prefix: "",
        darkTheme: "dark",
        themes: [
            {
                igentics: {
                    "primary": "#FF6600",
                    "primary-focus": "#FF1600",
                    "primary-content": "#131420",
                    "secondary": "#4A545E",
                    "secondary-focus": "#4A585E",
                    "secondary-content": "#131420",
                    "accent": "#FFB100",
                    "accent-focus": "#FFD150",
                    "accent-content": "#131420",
                    "neutral": "#181A2A",
                    "neutral-focus": "#131420",
                    "neutral-content": "#edf2f7",
                    "base-100": "#FFFFFF",
                    "base-content": "#382800",
                    "info": "#3ABFF8",
                    "info-content": "#382800",
                    "success": "#6CC24A",
                    "success-content": "#382800",
                    "warning": "#FBBD23",
                    "warning-content": "#382800",
                    "error": "#F87272",
                    "error-content": "#131420",
                    "--rounded-box": "0.5rem"
                },
            },
            "light",
            "dark"
        ],
    },
    safelist: process.env.NODE_ENV === "development" ? [{ pattern: /.*/ }] : [],
};
