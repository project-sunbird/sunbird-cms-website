const gulp = require('gulp');
const sass = require('gulp-sass');
sass.compiler = require('node-sass');

gulp.task('scss', function () {
  return gulp.src('../assets/custom/scss/mixed.min.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('../assets/custom/css/'));
});
  
gulp.task('watch', function() {
  gulp.watch('../assets/custom/scss/**/*.scss', ['scss'])  ;
});

gulp.task('default', ['scss','watch']);
