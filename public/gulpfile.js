var gulp = require('gulp');
var less = require('gulp-less');
var browserSync = require('browser-sync').create();
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var pkg = require('./package.json');

// Default task
gulp.task('default', ['less', 'minify-css', 'minify-js', 'copy']);

// Compile less files
gulp.task('less', function() {
    return gulp.src('less/style.less')
        .pipe(less())
        .pipe(header(banner, { pkg: pkg }))
        .pipe(gulp.dest('css'))
        .pipe(browserSync.reload({
            stream: true
        }))
}

