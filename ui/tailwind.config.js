/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      fontFamily: {
        brand: "Courgette",
        nunito: "Nunito",
      },
    },
  },
  plugins: [],
};
