var gulp = require('gulp')
var cssnano = require('gulp-cssnano')
var sass = require('gulp-sass')
var concat = require('gulp-concat')
var uglify = require('gulp-uglify')
var exec = require('child_process').exec

const { watch, series, parallel } = require('gulp')

gulp.task('cb', function(msg){
  console.log(msg)
})
gulp.task('processCSS', function(cb){
    console.log('Processing CSS...');
    cb()
})
gulp.task('processSCSS', function(cb){
    console.log('Processing SCSS...');
    cb()
})
gulp.task('processJS', function(cb){
    console.log('Processing JS...');
    cb()
})

gulp.task('phpunit', function(done) {
    exec('phpunit tests/PagesTest', function(error, stdout){
        console.log("Error: " + error, "Stdout: " + stdout)        
    });
    done()
})

gulp.task('watch', function(done) {
  gulp.watch('**/**/*.css', gulp.series('processCSS'));
  gulp.watch('**/**/*.scss', gulp.series('processSCSS'));
  gulp.watch('**/**/*.js', gulp.series('processJS'));
  gulp.watch('**/**/*.php', gulp.series('phpunit'));
  done();
});

gulp.task('default', function(done) {
    gulp.series('watch')
    done()
})

