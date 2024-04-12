/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.html',
    './lib/Templates/Errors/template.html'
  ],
  theme: {
    container: {
      center: true
    },
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: ["sunset"],
  },
}