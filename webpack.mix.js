const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/tpl/byweb/css/template.css');


mix.sass('resources/sass/app.scss', 'public/tpl/byweb/css/template.css');

//подключаем css для генерации фроненда cmd
// mix.styles([
//     'resources/tpl/byweb/css/template.css',
//     'resources/tpl/byweb/css/nav-menu.css',
//     'resources/tpl/byweb/css/slider.css',
// ], 'public/tpl/byweb/css/template.css');

// mix.copyDirectory('resources/tpl/byweb/img','public/tpl/byweb/img');

//подключаем js
// mix.scripts([
// 'resources/tpl/byweb/js/jquery.min.js',
// ], 'public/tpl/byweb/js/tpl-scripts.js')

//подключаем админку
mix.styles([

    'resources/tpl/admin/plugins/fontawesome-free/css/all.css',
    'resources/tpl/admin/css/adminlte.css',
    'resources/tpl/admin/css/custom.css',

], 'public/tpl/admin/dist/css/template.css');

//подключаем js админки
mix.scripts([
    'resources/tpl/admin/plugins/jquery/jquery.js',
    'resources/tpl/admin/plugins/bootstrap/js/bootstrap.bundle.js',
    'resources/tpl/admin/js/adminlte.js',
    'resources/tpl/admin/js/demo.js'

], 'public/tpl/admin/dist/js/tpl-scripts.js')

//подключаем js frontend
mix.scripts([
    'resources/tpl/byweb/js/aos.js',

], 'public/tpl/byweb/js/aos.js')

mix.copyDirectory('resources/tpl/admin/plugins/fontawesome-free/webfonts','public/tpl/admin/dist/webfonts');
mix.copyDirectory('resources/tpl/admin/img', 'public/tpl/admin/dist/img');
