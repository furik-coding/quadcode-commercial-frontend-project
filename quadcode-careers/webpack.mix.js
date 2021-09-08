let mix = require('laravel-mix');
let minifier = require('minifier');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
        jquery: ['$', 'window.jQuery', 'jQuery']
    })
    .js('resources/js/app.js', 'public/media/js')
    // .copy('resources/fonts', 'public/media/fonts')
    .sass('resources/sass/styles.scss', 'public/media/styles');

mix.then(() => {
    minifier.minify('public/media/styles/styles.css')
});
// 'public/media/styles/styles.min.css', {'outputStyle': 'compressed'});


mix.browserSync({
    proxy: false,
    server: {
        baseDir: "public",
        directory: true
    }
});
