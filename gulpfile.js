// Importing gulp API functions
const { src, dest, watch, series, parallel } = require("gulp");

const sourcemaps = require('gulp-sourcemaps');

// CSS related packages
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

// JS related packages
const jquery = require('jquery');
const popper = require('popper.js');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

// Path to files
const files = {
	fileDest: 'assets/dist/',
	scssPath: 'assets/css/styles.scss',
	jsPath: [
		'node_modules/jquery/dist/jquery.js',
		'node_modules/popper.js/dist/umd/popper.js',
		'node_modules/bootstrap/dist/js/bootstrap.js',
		'assets/js/**/*.js'
	],
	scssWatch: 'assets/css/**/*.scss',
	jsWatch: 'assets/js/**/*.js'
}

// CSS: Creates sourcemap, compiles sass, lints and minifies it
function cssTask(cb) {
	return src(files.scssPath)
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss([ autoprefixer(), cssnano()]))
		.pipe(sourcemaps.write('.'))
		.pipe(dest(files.fileDest));
	cb();
}

// Combines all JS files required for a bootstrap build
function jsTask(cb) {
	return src(files.jsPath)
		.pipe(concat('scripts.js'))
		.pipe(uglify())
		.pipe(dest(files.fileDest))
	cb();
}

function watchTask(){
	watch(
		[files.scssWatch, files.jsWatch],
		{interval: 1000, usePolling: true},
		series(
			parallel(cssTask, jsTask)
		)
	);
}

function watchCss(){
	watch(
		files.scssWatch,
		{interval: 1000, usePolling: true},
		series(
			parallel(cssTask)
			)
		);
}

function watchJs(){
	watch(
		files.jsPath,
		{interval: 1000, usePolling: true},
		series(
			parallel(jsTask)
			)
		);
}

exports.css = cssTask;
exports.js = jsTask;
exports.watch = watchTask;
exports.watchCss = watchCss;
exports.watchJs = watchJs;