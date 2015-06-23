var gulp = require('gulp');
var browserSync = require('browser-sync');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var sass = require('gulp-sass');

const reload = browserSync.reload;

gulp.task('browserify', function() {
  browserify('./jsx/app.jsx', { debug: true })
    .transform(babelify)
    .bundle()
    .on("error", function (err) { console.log("Error : " + err.message); })
    .pipe(source('./web/bundle.js'))
    .pipe(gulp.dest('./web'));
});

gulp.task('sass', function() {
  gulp.src('./scss/*.scss')
  .pipe(sass({
    includePaths: ['bower_components/foundation/scss']
  }))
  .pipe(gulp.dest('./web'));
});

gulp.task('serve', function() {
  browserSync.init({
    server: {
      baseDir: "./web"
    }
  });
});

gulp.watch(['./jsx/*.jsx'], ['browserify']);
gulp.watch(["./scss/*.scss"], ['sass']);

gulp.watch(["./web/*.js", "./web/*.css", "./web/*.html"], function() {
  reload();
});

//

gulp.task('default', ['browserify', 'sass', 'serve']);
