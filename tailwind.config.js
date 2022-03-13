const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: ['./src/**/*.php'],
  theme: {
    screens: {
      xs: '475px',
      ...defaultTheme.screens,
    },
    fontFamily: {
      sans: ['"Pretendard Variable"', 'sans-serif'],
    },
    extend: {
      colors: {
        entry: '#00d674',
      },
      backgroundSize: {
        '85%': '85%',
      },
    },
  },
  important: true,
  plugins: [require('@tailwindcss/typography')],
};
