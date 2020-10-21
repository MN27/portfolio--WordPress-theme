const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cleancss = require('gulp-clean-css');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
const imagemin = require('gulp-imagemin');
const mozjpeg = require('imagemin-mozjpeg');
const pngquant = require('imagemin-pngquant');

const compileSass = () => {
  return src('./src/css/scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        outputStyle: 'expanded',
      }),
    )
    .pipe(
      autoprefixer({
        overrideBrowserslist: ['defaults', 'last 2 versions'],
        cascade: false,
      }),
    )
    .pipe(sourcemaps.write('.'))
    .pipe(dest('./src/css'));
};

const cssMin = () => {
  return src('./src/css/style.css')
    .pipe(cleancss())
    .pipe(
      rename({
        suffix: '.min',
      }),
    )
    .pipe(dest('./assets/css'));
};

const jsMin = () => {
  return src('./src/js/*.js')
    .pipe(uglify())
    .pipe(
      rename({
        suffix: '.min',
      }),
    )
    .pipe(dest('./assets/js'));
};

const imageMin = () => {
  return src('./src/images/*.{jpg,jpeg,png,gif,svg}')
    .pipe(
      imagemin([
        pngquant('65-80'),
        mozjpeg({ quality: 80 }),
        imagemin.svgo(),
        imagemin.gifsicle(),
      ]),
    )
    .pipe(dest('./assets/images/'));
};

const watchSassFiles = () => watch('./src/css/scss/style.scss', compileSass);
exports.default = watchSassFiles;
exports.build = series(compileSass, cssMin, jsMin, imageMin);
