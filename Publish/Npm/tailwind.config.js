const plugin = require('tailwindcss/plugin')

module.exports = {
    darkMode: 'class',
    purge: [
        // Path to my php view it will only purge stuf we goin to use
        "./vendor/mariojgt/unity-user/src/views/**/*.php",
    ],
    theme: {
      extend: {},
    },
    variants: {
        extend: {
          textOpacity: ['dark']
        }
    },
    plugins: [require("daisyui")],
  }
