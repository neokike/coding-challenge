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

elixir(function (mix) {
    mix.sass('app.scss');
    mix.scripts([
        '../../../node_modules/angular/angular.min.js',
        '../../../node_modules/angular-validation/dist/angular-validation.min.js',
        '../../../node_modules/angular-validation/dist/angular-validation-rule.min.js',
        '../../../node_modules/angular-toastr/dist/angular-toastr.tpls.min.js',
        'app.js',
        'appCtrl.js',
        'appService.js'

    ]);
});
