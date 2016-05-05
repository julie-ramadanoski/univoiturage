var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.sass('app.scss');                                    // 'public/css/app.css
    mix.sass('bootstrap-datetimepicker.scss',                   'public/css/datepicker.css');
    mix.copy('resources/assets/css/ui-autocomplete.css',        'public/css/ui-autocomplete.css');

    mix.copy('resources/assets/js/autocomplete.js',             'public/js/autocomplete.js' );
    mix.copy('resources/assets/js/jquery.min.js',               'public/js/jquery.min.js' );
    mix.copy('resources/assets/js/moment.min.js',               'public/js/moment.min.js' );
    mix.copy('resources/assets/js/bootstrap-datetimepicker.js', 'public/js/bootstrap-datepicker.js');

    mix.copy('resources/assets/js/script.js',                   'public/js/script.js' );
    mix.copy('resources/assets/js/step.class.js',               'public/js/step.class.js' );

    mix.copy('resources/assets/js/script.js',                   'public/js/script.js' );
    mix.copy('resources/assets/js/script2.js',                  'public/js/script2.js' );

    // Filtrer les listes
     mix.copy('resources/assets/css/jplist.core.min.css',                      'public/css/jplist.core.min.css' );
     mix.copy('resources/assets/css/jplist.bootstrap.min.css',                 'public/css/jplist.bootstrap.min.css' );
     mix.copy('resources/assets/css/jplist.jquery-ui-bundle.min.css',          'public/css/jplist.jquery-ui-bundle.min.css' );
     
     mix.copy('resources/assets/js/jplist.core.min.js',                        'public/js/jplist.core.min.js' );
     mix.copy('resources/assets/js/jplist.bootstrap-pagination-bundle.min.js', 'public/js/jplist.bootstrap-pagination-bundle.min.js' );
     mix.copy('resources/assets/js/activerJpList.js',                          'public/js/activerJpList.js' );
     mix.copy('resources/assets/js/jplist.filter-toggle-bundle.min.js',        'public/js/jplist.filter-toggle-bundle.min.js' );
     mix.copy('resources/assets/js/jplist.jquery-ui-bundle.min.js',            'public/js/jplist.jquery-ui-bundle.min.js' );
     mix.copy('resources/assets/js/jplist.sort-bundle.min.js',                 'public/js/jplist.sort-bundle.min.js' );


});

