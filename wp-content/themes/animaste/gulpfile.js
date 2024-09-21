// npm i gulp-cli
const gulp = require('gulp'); // npm i gulp
const sass = require('gulp-sass')(require('sass')); // npm i gulp-sass sass --save-dev
const concat = require('gulp-concat'); // npm gulp-concat --save-dev
const sourcemaps = require('gulp-sourcemaps'); // npm install gulp-sourcemaps --save-dev


gulp.task('sass', function() {
    return gulp.src('dev/scss/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./')) 
        .pipe(gulp.dest('web/css'));
});

gulp.task('concat-js', function(){
    return gulp.src(['dev/js/*.js'])
    .pipe(concat('app.js'))
    .pipe(gulp.dest('web/js'));
});

gulp.task('copyImages', function() {
    return gulp.src('./dev/images/**/*')
        .pipe(gulp.dest('./web/images'));
});

gulp.task('copyFonts', function() {
    return gulp.src('./dev/fonts/**/*')
        .pipe(gulp.dest('./web/fonts'));
});





gulp.task('watch', function() {
    gulp.watch('./dev/scss/**/*.scss', gulp.series('sass'));
    gulp.watch('./dev/images/**/*', gulp.series('copyImages'));
    gulp.watch('./dev/fonts/**/*', gulp.series('copyFonts'));
});

gulp.task('-', gulp.parallel('sass', 'copyImages', 'copyFonts', 'watch'));