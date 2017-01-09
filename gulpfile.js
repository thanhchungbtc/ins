const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

        // front end page
        .styles([
            "/site/css/bootstrap.css",
            "/site/css/jpreloader.css",
            "/site/css/animate.css",
            "/site/css/plugin.css",
            "/site/css/owl.carousel.css",
            "/site/css/owl.theme.css",
            "/site/css/magnific-popup.css",
            "/site/css/style.css",
            "/site/css/bg.css",
            "/site/css/color.css",


        ], './public/site/css/vendor.css')

        // custom front end css
        .sass('site.scss', './public/site/css/site.css')

        .scripts([
            "/site/js/jquery.min.js",
            "/site/js/jpreLoader.js",
            "/site/js/bootstrap.min.js",
            "/site/js/jquery.isotope.min.js",
            "/site/js/easing.js",
            "/site/js/owl.carousel.js",
            "/site/js/classie.js",
            "/site/js/validation.js",
            "/site/js/wow.min.js",
            "/site/js/jquery.magnific-popup.min.js",
            "/site/js/enquire.min.js",
            "/site/js/designesia.js",

        ], './public/site/js/vendor.js')

        // =================end front end ===================

        .webpack('app.js')
        .scripts([
            'libs/sweetalert-dev.js',
        ], './public/js/libs.js')
        .styles([
            'libs/sweetalert.css'
        ], './public/css/libs.css')
        .browserSync({
            'proxy': 'ins.dev'
        });
});
