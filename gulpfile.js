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
    mix.sass("frontend/web-style.scss", "public/css/web-style.css");
    mix.sass("backend/admin-style.scss", "public/css/admin-style.css");
    
    mix.scripts(["frontend/menu.js", "frontend/index.js"], "public/js/web-index.js");
    mix.scripts(["frontend/menu.js", "frontend/skills.js"], "public/js/web-skills.js");
});

