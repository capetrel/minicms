const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableSuccessNotifications()
    .copyDirectory('resources/fonts', 'public/fonts')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/master.scss', 'public/css')
    .sass('resources/sass/slider.scss', 'public/css')
    .sass('resources/sass/datepicker.scss', 'public/css')
    .sass('resources/sass/wysiwyg.scss', 'public/css')
    .js('resources/js/master.js', 'public/js')
    .js('resources/js/main.js', 'public/js')
    .js('resources/js/slider.js', 'public/js')
    .js('resources/js/datepicker.js', 'public/js')
    .js('resources/js/wysiwyg.js', 'public/js')
    .sourceMaps()
    .browserSync('http://laravel8.test');

