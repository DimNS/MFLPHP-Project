var gulp   = require('gulp');            // Сам Gulp JS
var uglify = require('gulp-uglify');     // Минификация JS
var concat = require('gulp-concat');     // Склейка файлов

// Сборка проекта для тестирования
gulp.task('default', function() {
    // Запускаем следилку за изменением файлов
    gulp.watch('src/js/*.js', function(event) {
        // js
        gulp.src(['src/js/*.js'])
            .pipe(concat('index.js'))
            .pipe(gulp.dest('assets/js'));
    });
});

// Сборка проекта для релиза
gulp.task('build', function() {
    // js
    gulp.src(['src/js/*.js'])
        .pipe(concat('index.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));
});