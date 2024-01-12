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

mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/metisMenu.min.js',
    'resources/js/waves.min.js',
    'resources/js/chosen.min.js',
    'resources/js/Library.js',
    'resources/js/main.min.js',
    'resources/js/JS_Listtype.js',
], 'public/assets/js/app.min.js');
