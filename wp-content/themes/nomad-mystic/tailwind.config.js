/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
        colors: {
            'color-teal': 'var(--color-teal)',
            'color-teal-light': 'var(--color-teal-light)',
            'color-purple': 'var(--color-purple)',
            'color-purple-light': 'var(--color-purple-light)',
            'color-dark-grey': 'var(--color-dark-grey)',
        }
    },
  },
  plugins: [
    {
      'postcss-import': {},
      'tailwindcss/nesting': 'postcss-nested',
      'autoprefixer': {}
    }
  ]
};

export default config;
