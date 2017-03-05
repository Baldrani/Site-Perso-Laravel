const elixir = require('laravel-elixir');
require('laravel-elixir-webpack');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .sass('home.scss')
       .webpack('app.js');

     mix.version(['css/app.css','js/app.js' ]);

     mix.browserSync({
        proxy: 'maelmayon.app'
    });

});
