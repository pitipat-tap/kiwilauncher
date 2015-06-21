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
    //mix.less('app.less');
    mix.sass("frontend/web_style.scss", "public/css/web_style.css");
    mix.sass("backend/admin_style.scss", "public/css/admin_style.css");
    
    mix.scripts(["frontend/menu.js", "frontend/index.js"], "public/js/web_index.js")
});

