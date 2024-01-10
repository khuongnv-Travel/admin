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

 mix.styles([
    // 'resources/css/base.min.css',
    'resources/css/app.min.css',
    'resources/css/main.min.css',
    'resources/css/boxicons/css/boxicons.min.css',
], 'public/assets/css/app.min.css');

mix.copyDirectory('resources/css/boxicons/fonts', 'public/assets/fonts');

// mix.js([
    // 'resources/js/jquery.min.js',
    // 'resources/js/app.min.js',
    // 'resources/js/main.min.js',
// ], 'public/assets/js/app.min.js');
