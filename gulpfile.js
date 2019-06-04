const gulp = require("gulp");
const sass = require("gulp-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const sourcemaps = require("gulp-sourcemaps");
const browserSync = require("browser-sync").create();

const paths = {
	styles: {
		src: "sass/**/*.scss",
		dest: "."
	}
};

function build() {
	return (
		gulp
			.src(paths.styles.src)
			.pipe(sourcemaps.init())
			.pipe(sass())
			.on("error", sass.logError)
			// .pipe(postcss([autoprefixer(), cssnano()]))
			.pipe(postcss([autoprefixer()]))
			.pipe(sourcemaps.write())
			.pipe(gulp.dest(paths.styles.dest))
			.pipe(browserSync.stream())
	);
}

function watch() {
	browserSync.init({
		proxy: "rarelyneeded.local"
	});
	gulp.watch(paths.styles.src, build);
	gulp.watch("**/*.php").on("change", browserSync.reload);
}

exports.watch = watch;
exports.build = build;
exports.default = gulp.parallel(build, watch);
