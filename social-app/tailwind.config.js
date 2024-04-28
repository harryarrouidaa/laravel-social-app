/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: ['light', 'dark'
            // {
            //     light: {
            //         primary: "#570df8",
            //         "primary-focus": "#4506cb",
            //         "primary-content": "#ffffff",

            //         secondary: "#f000b8",
            //         "secondary-focus": "#bd0091",
            //         "secondary-content": "#ffffff",

            //         accent: "#37cdbe",
            //         "accent-focus": "#2ba69a",
            //         "accent-content": "#ffffff",

            //         neutral: "#3b424e",
            //         "neutral-focus": "#2a2e37",
            //         "neutral-content": "#ffffff",

            //         "base-100": "#f1f5f9",
            //         "base-200": "#f9fafb",
            //         "base-300": "#ced3d9",
            //         "base-content": "#1e2734",

            //         info: "#1c92f2",
            //         success: "#009485",
            //         warning: "#ff9900",
            //         error: "#ff5724",

            //         "--rounded-box": "1rem",
            //         "--rounded-btn": ".5rem",
            //         "--rounded-badge": "1.9rem",

            //         "--animation-btn": ".25s",
            //         "--animation-input": ".2s",

            //         "--btn-text-case": "uppercase",
            //         "--navbar-padding": ".5rem",
            //         "--border-btn": "1px",
            //     },
            // },
        ],
    },
};
