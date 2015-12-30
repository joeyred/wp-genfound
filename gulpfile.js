var gulp     	= require('gulp')
,	browserSync = require('browser-sync').create()
,	plugin		= require('gulp-load-plugins')()
,	sequence 	= require('run-sequence')
,	del 		= require('del')
;

plugin({
  rename: {
    'merge-media-queries': 'mmq'
  }
});

/*
CONFIG
 */

// BrowserSync
var PORT = 8000;

// CSS Vendor Prefixer
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];

// File paths to various assets are defined here.
var PATH = {
  sass: [
    'bower_components/foundation-sites/scss',
    'bower_components/motion-ui/src/'
  ],
  javascript: [
    'bower_components/what-input/what-input.js',
    'bower_components/foundation-sites/js/foundation.core.js',
    'bower_components/foundation-sites/js/foundation.util.*.js',
    // Paths to individual JS components defined below
    'bower_components/foundation-sites/js/foundation.abide.js',
    'bower_components/foundation-sites/js/foundation.accordion.js',
    'bower_components/foundation-sites/js/foundation.accordionMenu.js',
    'bower_components/foundation-sites/js/foundation.drilldown.js',
    'bower_components/foundation-sites/js/foundation.dropdown.js',
    'bower_components/foundation-sites/js/foundation.dropdownMenu.js',
    'bower_components/foundation-sites/js/foundation.equalizer.js',
    'bower_components/foundation-sites/js/foundation.interchange.js',
    'bower_components/foundation-sites/js/foundation.magellan.js',
    'bower_components/foundation-sites/js/foundation.offcanvas.js',
    'bower_components/foundation-sites/js/foundation.orbit.js',
    'bower_components/foundation-sites/js/foundation.responsiveMenu.js',
    'bower_components/foundation-sites/js/foundation.responsiveToggle.js',
    'bower_components/foundation-sites/js/foundation.reveal.js',
    'bower_components/foundation-sites/js/foundation.slider.js',
    'bower_components/foundation-sites/js/foundation.sticky.js',
    'bower_components/foundation-sites/js/foundation.tabs.js',
    'bower_components/foundation-sites/js/foundation.toggler.js',
    'bower_components/foundation-sites/js/foundation.tooltip.js',
    'assets/js/!(app.js)**/*.js',
    'assets/js/app.js'
  ]
};

/*
 * Browsersync
 */

gulp.task('browserSync', function() {
	 browserSync.init({ 
        proxy: "wordpress-themes.dev"
    ,	notify: false // boolean value, Toggle notifications of bsync activity
    ,	open: false // toggle auotmatic opening of webpage upong bsync starting
    
    });
});

/*
 * PIPES
 */

/* Clean */
gulp.task('clean', function() {
	del(['css/app*.css*', 'js/app*.js*']);
});

/* Compile SCSS */
gulp.task('compileSass', function() {
	return gulp.src('scss/app.scss')
		.pipe(plugin.maps.init())
		.pipe(plugin.sass({
			includePaths: PATH.sass
		})
			.on('error', plugin.sass.logError)
		)
		.pipe(plugin.mmq({
			log: true
		}))
		.pipe(plugin.autoprefixer({
			browsers: COMPATIBILITY
		}))
		.pipe(plugin.maps.write('./'))
		.pipe(gulp.dest('css'))
		.pipe(browserSync.stream({ // Inject Styles
			match: '**/*.css' // Force source map exclusion *This fixes reloading issue on each file change*
		})); 	
});

/* Concatinate Main JS Files */
gulp.task('concatScripts', function() {
	return gulp.src(mainScripts)
	.pipe(plugin.maps.init()) 
	.pipe(concat('app.js')) 
	.pipe(plugin.maps.write('./')) 
	.pipe(gulp.dest('js')); 
});

/* Watch Task */
gulp.task('watch', ['browserSync'], function() {
	gulp.watch('assets/scss/**/*.scss', ['compileSass']);
	gulp.watch('**/*.php').on('change', browserSync.reload);
	gulp.watch('foundation/php/**/*.php').on('change', browserSync.reload);  
	gulp.watch('assets/js/**/*.js', ['concatScripts']).on('change', browserSync.reload); 
});

gulp.task('dev', function(cb) {
	sequence(
		'clean'
		'compileSass',
		'concatScripts',
		cb
	);
})

gulp.task('default', function(){
	gulp.start( 'watch', ['dev'] );
});


