var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.scripts(['../../../node_modules/jquery/dist/jquery.min.js',
    '../../../node_modules/bootstrap/dist/js/bootstrap.js',
    '../../../resources/assets/js/page_cleaner.js',
    '../../../resources/assets/js/nav.js',
    '../../../resources/assets/js/nav_movements.js',
    '../../../resources/assets/js/main_views/programmation/week_programmation.js'
    ], 'public/js/app.js');

     mix.scripts([
    '../../../resources/assets/js/main_views/programmation/week_programmation.js'
    ], 'public/js/main_views/programmation/app.js');

     mix.scripts([
    '../../../resources/assets/js/main_views/staff/staff.js'
    ], 'public/js/main_views/staff/staff.js');

     mix.scripts([
    '../../../resources/assets/js/main_views/the20/the20.js'
    ], 'public/js/main_views/the20/the20.js');

});
