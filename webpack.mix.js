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
    'resources/css/app.min.css',
    'resources/css/main.min.css',
    'resources/css/boxicons/css/boxicons.min.css',
    'resources/css/chosen/chosen.min.css',
    'resources/css/toast.min.css',
    'resources/css/jquery-confirm.min.css',
], 'public/assets/css/app.min.css');

mix.copyDirectory('resources/css/boxicons/fonts', 'public/assets/fonts');

mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/metisMenu.min.js',
    'resources/js/waves.min.js',
    'resources/js/chosen.min.js',
    'resources/js/toast.min.js',
    'resources/js/jquery-confirm.min.js',
    'resources/js/chosen/chosen.min.js',
    'resources/js/Library.js',
    'resources/js/main.min.js',
], 'public/assets/js/app.min.js');

mix.scripts([
    'resources/js/pages/JS_Listtype.js',
    'resources/js/pages/JS_List.js',
    'resources/js/pages/JS_Apartment.js',
    'resources/js/pages/JS_Support.js',
], 'public/assets/js/pages.min.js');
