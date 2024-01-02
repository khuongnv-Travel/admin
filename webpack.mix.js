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
    'resources/css/assets/base.min.css',
    'resources/css/assets/app.min.css',
    'resources/css/assets/main.min.css',
    'resources/css/assets/jquery-confirm.min.css',
    'resources/css/assets/jquery-confirm.min.css',
    'resources/css/assets/toast.min.css',
    'resources/css/assets/font.min.css',
    'resources/css/assets/admin.min.css',
    'resources/css/assets/boxicons/css/boxicons.min.css',
    'resources/css/assets/chosen/chosen.min.css',
    'resources/css/assets/datepicker/datepicker.min.css',
    
], 'public/css/app.min.css');

mix.js([
    'resources/js/assets/jquery.min.js',
    'resources/js/assets/app.min.js',
    'resources/js/assets/main.min.js',
    'resources/js/assets/jquery-confirm.min.js',
    'resources/js/assets/Library.js',
    'resources/js/assets/toast.min.js',
    'resources/js/assets/chosen.min.js',
    'resources/js/assets/datepicker.min.js',
    'resources/js/assets/tinymce.min.js',
    'resources/js/pages/JS_Dashboard.js',

], 'public/js/app.min.js')