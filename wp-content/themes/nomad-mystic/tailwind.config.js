/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
    },
  },
  plugins: [
    {
      'postcss-import': {},
      'tailwindcss/nesting': 'postcss-nesting',
      'autoprefixer': {}
    }
  ]
};

export default config;
