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
    mix.sass('main_views/the20.scss', 'public/css/main_views/the20.css');
    mix.sass('elements/week_shows.scss', 'public/css/elements/week_shows.css');

    mix.scripts(['../../../node_modules/jquery/dist/jquery.min.js',
    '../../../node_modules/bootstrap/dist/js/bootstrap.js',
    '../../../node_modules/moment/min/moment.min.js',
    '../../../resources/assets/js/main_views/content/moment_es.js',
    '../../../resources/assets/js/page_cleaner.js',
    '../../../resources/assets/js/nav.js',
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

     mix.scripts([
         '../../../resources/assets/js/nav_movements.js'
    ], 'public/js/nav_movements.js');

     mix.scripts([
         '../../../resources/assets/js/main_views/content/pagination_manager.js'
    ], 'public/js/main_views/content/pagination_manager.js');

});
