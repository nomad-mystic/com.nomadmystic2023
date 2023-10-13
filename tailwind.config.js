/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
        colors: {
            'teal': 'var(--color-teal)',
            'teal-light': 'var(--color-teal-light)',
            'purple': 'var(--color-purple)',
            'purple-light': 'var(--color-purple-light)',
            'dark-grey': 'var(--color-dark-grey)',
            'white': 'var(--color-white)',
            'black': 'var(--color-black)',
            'black-full': 'var(--color-black-full)',
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
