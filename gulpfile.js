var gulp = require('gulp');
var browserSync = require('browser-sync');
var browserify = require('browserify');
var babelify = require('babelify');
var source = require('vinyl-source-stream');
var sass = require('gulp-sass');
var react = require('react');

const reload = browserSync.reload;

gulp.task('browserify', function() {
  browserify('./jsx/app.jsx', { debug: true })
    .transform(babelify)
    .bundle()
    .on("error", function (err) { console.log("Error : " + err.message); })
    .pipe(source('./web/bundle.js'))
    .pipe(gulp.dest('./'));
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
    proxy: {
      target: "http://sgm.local:8000/app_dev.php"
    }
  });
});

gulp.watch(['./jsx/*.jsx'], ['browserify']);
gulp.watch(["./scss/*.scss"], ['sass']);

gulp.watch(["./web/bundle.js", "./web/main.css", "./web/index.html"], function() {
  reload();
});

gulp.task('default', ['browserify', 'sass', 'serve']);
