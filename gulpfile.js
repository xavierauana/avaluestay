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
    mix.scripts([
        "../../../node_modules/bootstrap-less/js/bootstrap.js",
        "../../../node_modules/vue/dist/vue.js",
        "../../../node_modules/medium-editor/dist/js/medium-editor.js",
        "../../../node_modules/bootstrap-sweetalert/lib/sweet-alert.js",
        "registration.js",
        "dropzone.js",
        "conversations.js",
        "creditCardValidation.js",
        "subscription.js",
        "editor.js"
    ], "public/js/back.js")
        .scripts([
            "../../../node_modules/moment/moment.js",
            "../../../node_modules/vue/dist/vue.js",
            "../../../node_modules/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js",
            "../../../node_modules/bootstrap-sweetalert/lib/sweet-alert.js"
        ], "public/js/front.js")
        .less([
            'app.less'
        ])
        .version([
            "css/app.css",
            'js/back.js'
        ])
});
