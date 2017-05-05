const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

var paths = {
    'cssprogresswizz': '/home/semo/webdev/bewerber/node_modules/css-progress-wizard'
};


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
    mix.copy('node_modules/css-progress-wizard', 'resources/assets/sass')
        .sass('app.scss')
        .webpack('app.js')
});