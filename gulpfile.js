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
    mix.sass('app.scss');
    mix.sass('bootstrap-datetimepicker.scss', 'public/css/datepicker.css');
    mix.copy('resources/assets/js/jquery.min.js','public/js/jquery.min.js' );
    mix.copy('resources/assets/js/moment.min.js','public/js/moment.min.js' );
    mix.copy('resources/assets/js/bootstrap-datetimepicker.js', 'public/js/bootstrap-datepicker.js');
});
