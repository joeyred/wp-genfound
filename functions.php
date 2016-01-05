<?php

// Start the engine
include_once( get_template_directory() . '/lib/init.php' );

// Foundation Integration Into Genesis
include_once( get_stylesheet_directory() . 'inc/foundation/php/foundation.php' );

// Helper functions
include_once( get_stylesheet_directory() . 'inc/helpers.php' );

add_theme_support( 'html5' );

// Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );