let mix = require('laravel-mix');

mix.js('javascript/src/index.js', 'javascript/dist/AutocompleteField.js');

mix.options({
  processCssUrls: false,
});
