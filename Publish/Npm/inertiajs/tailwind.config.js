const plugin = require('tailwindcss/plugin')

module.exports = {
    darkMode: 'class',
    mode: 'jit',
    purge: [
        // Path to my php view it will only purge stuf we goin to use
        "./vendor/mariojgt/skeleton/src/views/**/*.php",
        "./resources/vendor/Skeleton/js/**/*.vue",
    ],
    theme: {
      extend: {},
    },
    variants: {
        extend: {
          textOpacity: ['dark']
        }
    },
    plugins: [
        require('daisyui'),
    ],
  }
