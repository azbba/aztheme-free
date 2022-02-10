import {src, dest, watch, series, parallel} from 'gulp';
import info from './package.json';
import yargs from 'yargs';
import gulpIf from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import babel from 'gulp-babel';
import uglify from 'gulp-uglify';
import imagemin from 'gulp-imagemin';
import del from 'del';
import wpPot from 'gulp-wp-pot';
import browserSync  from 'browser-sync';
import zip from 'gulp-zip';

const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass);
const server = browserSync.create();

/**
 * Browser Sync tasks
*/

export const serve = done => {
  server.init({
    proxy: `http://${info.name}.free`
  });
  done();
};

export const reload = done => {
  server.reload();
  done();
}

const paths = {
  styles: {
    all: 'src/scss/**/*.scss',
    src: [`src/scss/${info.name}.scss`],
    dest: 'assets/css/'
  },
  scripts: {
    all: 'src/js/**/*.js',
    src: [`src/js/${info.name}.js`],
    dest: 'assets/js/'
  },
  images: {
    src: 'src/images/**/*.{jpg,jpeg,png,svg}',
    dest: 'assets/images/'
  },
  package: {
    src: [
      '**/*',
      '!node_modules{,/**}',
      '!src{,**}',
      '!.babelrc',
      '!.editorconfig',
      '!gulpfile.babel.js',
      '!package-lock.json',
      '!README.md',
      '!.git{,/**}',
      '!.vscode',
      '!packaged',
      '!package.json'
    ],
    dest: 'packaged'
  }
};

/**
 * Clean generated files 
 * @returns 
*/

export const clean = () => del([
  `assets/css/**`,
  `assets/js/**`,
  `assets/images/**`,
  `languages`,
  `packaged`
], {force: true});

/**
 * CSS tasks 
 * @returns 
*/

export const styles = () => {
  return src(paths.styles.src)
    .pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
    .pipe(
      sass({
        outputStyle: !PRODUCTION ? 'expanded': 'compressed'
      }).on('error', sass.logError)
    )
    .pipe(gulpIf(!PRODUCTION, sourcemaps.write('.')))
    .pipe(dest(paths.styles.dest))
    .pipe(server.stream());
};

/**
 * JavaScript tasks 
 * @returns 
*/

export const scripts = () => {
  return src(paths.scripts.src)
    .pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
    .pipe( babel() )
    .pipe( gulpIf( PRODUCTION, uglify() ) )
    .pipe(gulpIf(!PRODUCTION, sourcemaps.write('.')))
    .pipe(dest(paths.scripts.dest));
};

/**
 * Images tasks
 * @returns 
*/

export const images = () => {
  return src(paths.images.src)
    .pipe(gulpIf(PRODUCTION, imagemin()))
    .pipe(dest(paths.images.dest));
};

/**
 * Generates pot files 
 * @returns 
*/

export const pot = () => {
  return src('**/*.php')
    .pipe(
      wpPot({
        domain: info.name
      })
    )
    .pipe(dest(`languages/${info.name}.pot`));
};

/**
 * Compress project 
*/

export const compress = () => {
  return src(paths.package.src)
    .pipe(zip(`${info.name}.zip`))
    .pipe(dest(paths.package.dest));
};

/**
 * Watch tasks 
*/

export const watchTasks = () => {
  watch(paths.styles.all, styles);
  watch(paths.scripts.all, series(scripts, reload));
  watch(paths.images.src, series(images, reload));
  watch('**/*.php', reload);
};

/**
 * Development task 
*/

export const dev = series(
  clean,
  parallel(styles, scripts, images),
  serve,
  watchTasks
);

/**
 * Production task 
*/

export const build = series(
  clean,
  parallel(styles, scripts, images),
  pot
);

/**
 * Bundle task 
*/

export const bundle = series(
  build,
  compress
);

export default dev;