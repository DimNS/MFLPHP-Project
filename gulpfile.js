var gulp         = require('gulp');              // Сам Gulp JS
var uglify       = require('gulp-uglify');       // Минификация JS
var concat       = require('gulp-concat');       // Склейка файлов
var autoprefixer = require('gulp-autoprefixer'); // Добавление необходимых css-префиксов

// Сборка проекта для тестирования
gulp.task('default', function() {
    // Запускаем следилку за изменением файлов (JS)
    gulp.watch('src/js/*.js', function(event) {
        gulp.src(['src/js/*.js'])
            .pipe(concat('index.js'))
            .pipe(gulp.dest('assets/js'));
    });

    // Запускаем следилку за изменением файлов (CSS)
    gulp.watch('src/css/*.css', function(event) {
        gulp.src(['src/css/*.css'])
            .pipe(concat('index.css'))
            .pipe(gulp.dest('assets/css'));
    });
});

// Сборка проекта для релиза
gulp.task('build', function() {
    // js
    gulp.src(['src/js/*.js'])
        .pipe(concat('index.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js'));

    // css
    gulp.src(['src/css/*.css'])
        .pipe(concat('index.css'))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('assets/css'));
});