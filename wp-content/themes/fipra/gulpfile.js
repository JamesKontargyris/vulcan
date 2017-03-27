// Dirs
var baseDir = 'wp-content/themes/fipradotcom/';
var sassDir = baseDir + 'sass/';
var imgDir = baseDir + 'img/';
var jsDir = baseDir + 'js/';

// Gulp
var gulp = require('gulp');

// Sass/CSS stuff
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');

// Images
var imagemin = require('gulp-imagemin');

// JS
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');

//Others
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');

// compile all your Sass
gulp.task('sass', function (){
    gulp.src([sassDir + 'style.scss'])
        .pipe(plumber())
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(prefix(
            "last 1 version", "> 1%", "ie 8", "ie 7"
        ))
        .pipe(gulp.dest(baseDir));
});

// uglify all JS
gulp.task('scripts', function (){
    gulp.src([jsDir + '**/*.js'])
        .pipe(plumber())
        // .pipe(concat('site.min.js'))
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(baseDir + 'minjs'));
});

gulp.task('images', function () {
    gulp.src(imgDir + '**/*')
        .pipe(plumber())
        .pipe(imagemin({
            progressive: true,
            optimizationLevel: 2
        }))
        .pipe(gulp.dest(baseDir + 'minimg'));
});

gulp.task('default', function(){

    gulp.run('sass');
    //gulp.run('imagemin');

    // watch me getting Sassy
    gulp.watch(sassDir + "**/*.scss", function(event){
        gulp.run('sass');
    });
    // images
    gulp.watch(imgDir + "/**/*", function(event){
        //gulp.run('imagemin');
        //gulp.run('svgmin');
    });

    gulp.watch(jsDir + "/**/*", function(event){
        gulp.run('scripts');
    });
});