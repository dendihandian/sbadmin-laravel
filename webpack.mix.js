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

mix.js('resources/js/app/app.js', 'public/js')
    .js('resources/js/admin/admin.js', 'public/js')
    .sass('resources/sass/app/app.scss', 'public/css')
    .sass('resources/sass/admin/admin.scss', 'public/css')
    .copy('node_modules/startbootstrap-sb-admin-2/img', 'public/images/sbadmin')
    .sourceMaps()
    .browserSync('sbadmin-laravel-starter.test')
    .version();
