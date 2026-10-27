/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        brand: '#FF6B2B', // Warna aksen orange/amber portofolio
      }
    },
  },
  plugins: [],
}