let mix = require('laravel-mix');

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
 /*
mix.styles(
	["vendor/twbs/bootstrap/dist/css/bootstrap.css"]
	,
	"public/css/all.css"
);

mix.scripts(
	[
		"vendor/twbs/bootstrap/dist/js/bootstrap.js",
		"vendor/twbs/bootstrap/dist/js/bootstrap.bundle.js",
	],
	"public/js/all.js"
);
*/

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
