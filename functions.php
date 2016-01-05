<?php
/**
 * Theme functions file
 *
 * @package GenFound
 */

// Start the engine
include_once( get_template_directory() . '/lib/init.php' );

// Foundation Integration Into Genesis
include_once( get_stylesheet_directory() . '/inc/foundation/foundation.php' );

// Helper functions
include_once( get_stylesheet_directory() . '/inc/helpers.php' );

// Add HTML5 markup structure
add_theme_support( 'html5' );

// Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// Enqueue Styles and Scripts
add_action('wp_enqueue_scripts', 'genfound_styles_scripts');
function genfound_styles_scripts() {
	// Styles
	genfound_enqueue( 'style', 'main-stylesheet', 'css', 'app' );
	wp_enqueue_style( 'dashicons' );

	// Scripts
	genfound_enqueue( 'script', 'main_js', 'js', 'app', array('jquery'), '', true );
}
