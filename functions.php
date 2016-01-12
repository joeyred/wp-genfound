<?php
/**
 * Theme functions file
 *
 * @package GenFound
 */

// Start the engine
include_once( get_template_directory() . '/lib/init.php' );

// Foundation Integration Into Genesis
include_once( get_stylesheet_directory() . '/inc/foundation/foundation-init.php' );

// Helper functions
include_once( get_stylesheet_directory() . '/inc/helpers.php' );

// Add HTML5 markup structure
add_theme_support( 'html5' );

// Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

add_theme_support( 'genesis-structural-wraps', array( 'header' ) );

// Add Support for Flex Box Grid
// add_theme_support( 'genfound-flex-grid' );

// Enqueue Styles and Scripts
add_action('wp_enqueue_scripts', 'genfound_styles_scripts');
function genfound_styles_scripts() {
	// Styles
	genfound_enqueue( 'main-stylesheet', 'css/app.css' );
	wp_enqueue_style( 'dashicons' );

	// Scripts
	genfound_enqueue( 'main_js', 'js/app.js', array('jquery'), '', true );
}

add_action('genesis_before_header', 'genfound_debug' );
function genfound_debug() {

	$debug = genfound_flex_grid_supported();

	echo $debug ? 'true' : 'false';
}