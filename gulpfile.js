const themeName = "novalegionova";

const { src, dest, watch, series } = require('gulp');
const babel = require('gulp-babel');
const minify = require('gulp-clean-css');
const browsersync = require('browser-sync').create();
const prefix = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const terser = require('gulp-terser');
const del = require('del');
const sass = require('gulp-sass')(require('sass'));
const replace = require('gulp-replace');
const fs = require('fs');

const jsFiles = [
    './src/js/crucial-values.js',
    './src/js/inquiry-form.js',
    './src/js/header.js',
    './src/js/menu.js',
];

function browser_sync_serve(cb) {
    browsersync.init({
        open: 'external',
        host: `${themeName}.dev`,
        proxy: `${themeName}.dev`,
        port: 3000,
        https: {
            key: "C:/laragon/etc/ssl/laragon.key",
            cert: "C:/laragon/etc/ssl/laragon.crt",
        },
        notify: {
            styles: {
                top: 'auto',
                bottom: '0',
            },
        },
    });
    cb();
}

function browser_sync_reload(cb) {
    browsersync.reload();
    cb();
}

function scss_dev() {
    return src('src/scss/main.scss', { sourcemaps: true })
        .pipe(sass())
        .pipe(prefix('last 2 versions'))
        .pipe(minify())
        .pipe(dest('dist/css', { sourcemaps: '.' }));
}

function scss_build() {
    return src('src/scss/main.scss')
        .pipe(sass())
        .pipe(prefix('last 2 versions'))
        .pipe(minify())
        .pipe(dest('dist/css'));
}

function js_dev() {
    return src(jsFiles, { sourcemaps: true })
        .pipe(babel({ presets: ['@babel/preset-env'] }))
        .pipe(terser())
        .pipe(concat('main.js'))
        .pipe(dest('dist/js', { sourcemaps: '.' }));
}

function js_build() {
    return src(jsFiles)
        .pipe(babel({ presets: ['@babel/preset-env'] }))
        .pipe(terser())
        .pipe(concat('main.js'))
        .pipe(dest('dist/js'));
}

// Remove source maps
function delete_maps() {
    return del([
        'dist/js/*.map',
        'dist/css/*.map'
    ]);
}

// Increment version number
function increment_build_ver(done) {
    try {
        const versionFile = 'version.json';
        let version = 1;
        if (fs.existsSync(versionFile)) {
            const data = fs.readFileSync(versionFile);
            const jsonData = JSON.parse(data);
            version = jsonData.version + 1;
        }
        fs.writeFileSync(versionFile, JSON.stringify({ version: version }));
        done();
    } catch (error) {
        done(error);
    }
}

// Update version number in certain files
function set_build_ver() {
    const versionFile = 'version.json';
    let version = 1;
    
    if (fs.existsSync(versionFile)) {
        const data = fs.readFileSync(versionFile);
        const jsonData = JSON.parse(data);
        version = jsonData.version;
    }

    // Update styles.php and scripts.php with version number
    src(['functions/styles.php', 'functions/scripts.php'])
        .pipe(replace(/(\?v=)\d+/g, `?v=${version}`))
        .pipe(dest('functions'));

    // Update style.css with version number
    return src('style.css')
        .pipe(replace(/Version: \d+/g, `Version: ${version}`))
        .pipe(dest('.'));
}

// Watch Task
function watch_task() {
    watch(
        ['*.html', '*.php', 'includes/**/*.php', 'functions/**/*.php', 'templates/**/*.php', 'data/**/*.php', 'data/**/*', 'components/**/*.php', 'partials/**/*.php'],
        series(browser_sync_reload)
    );
    watch(
        ['woocommerce/*.php', 'woocommerce/**/*.php', 'functions/woocommerce/**/*.php'],
        series(browser_sync_reload)
    );
    watch(
        ['src/scss/**/*.scss'],
        series(scss_dev, browser_sync_reload)
    );
    watch(
        ['src/**/*.js'],
        series(js_dev, browser_sync_reload)
    );
}

// Default Gulp Task
exports.default = series(
    scss_dev,
    js_dev,
    browser_sync_serve,
    watch_task,
);

// Build Gulp Task
exports.build = series(
    scss_build,
    js_build,
    delete_maps,
    increment_build_ver,
    set_build_ver,
);