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
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/app.js', 'public/tpl/byweb/js').vue();

mix.sass('resources/sass/app.scss', 'public/tpl/byweb/css/template.css')
    // подключаем стайлы aos анимации с ноды, js не заработал подключил ниде просто с оф сайта
    .sass('node_modules/aos/src/sass/aos.scss', 'public/tpl/byweb/css');

// подключаем js frontend
mix.scripts([
    'resources/tpl/byweb/js/aos.js',
], 'public/tpl/byweb/js/aos.js')

//подключаем стайлы админки
mix.styles([

    'resources/tpl/admin/plugins/fontawesome-free/css/all.css',
    'resources/tpl/admin/plugins/select2/css/select2.css',
    'resources/tpl/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
    'resources/tpl/admin/css/adminlte.css',
    'resources/tpl/admin/css/custom.css',


], 'public/tpl/admin/dist/css/template.css');

//подключаем js админки
mix.scripts([
    'resources/tpl/admin/plugins/jquery/jquery.js',
    'resources/tpl/admin/plugins/bootstrap/js/bootstrap.bundle.js',
    'resources/tpl/admin/plugins/select2/js/select2.full.js',
    'resources/tpl/admin/js/adminlte.js',
    'resources/tpl/admin/js/demo.js',

], 'public/tpl/admin/dist/js/tpl-scripts.js');

//копируем файлы из директорий
mix.copyDirectory('resources/tpl/admin/plugins/fontawesome-free/webfonts','public/tpl/admin/dist/webfonts');
mix.copyDirectory('resources/tpl/admin/img', 'public/tpl/admin/dist/img');

//frontend design
mix.copyDirectory('resources/tpl/byweb/img', 'public/tpl/byweb/img');
mix.copyDirectory('resources/tpl/byweb/webfonts', 'public/tpl/byweb/webfonts');
mix.scripts(['resources/tpl/byweb/css/all.css'], 'public/tpl/byweb/css/all.css');
