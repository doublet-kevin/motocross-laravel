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
                primary: "var(--primary-color)",
                secondary: "var(--secondary-color)",
                accent: "var(--accent-color)",
                dark: "var(--dark-color)",
                light: "var(--light-color)",
            },
        },
    },
    plugins: [],
};
