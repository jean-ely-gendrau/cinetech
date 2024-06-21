const plugin = require("tailwindcss/plugin");
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./frontend/src/**/*.{php,html,js}",
    "./frontend/public_html/**/*.{php,html,js}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      textShadow: {
        sm: "0 1px 2px var(--tw-shadow-color)",
        DEFAULT: "0 2px 4px var(--tw-shadow-color)",
        md: "1px 3px 2px var(--tw-shadow-color)",
        lg: "0 8px 4px var(--tw-shadow-color)",
      },
      backgroundImage: {
        paintbrush:
          "url('http://cinetech.test/assets/images/paint_brush_background.jpg')",
        placeholder:
          "url('http://cinetech.test/assets/images/placeholder.png')",
      },
    },
  },
  plugins: [
    plugin(function ({ matchUtilities, theme }) {
      matchUtilities(
        {
          "text-shadow": (value) => ({
            textShadow: value,
          }),
        },
        { values: theme("textShadow") }
      );
    }),
    require("flowbite/plugin"),
  ],
};
