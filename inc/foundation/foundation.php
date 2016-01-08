<?php
/**
 * Main Foundation 6 file for merging Foundation 6 with Genesis
 *
 * @since 0.1.0
 * @package GenFound
 */

// Navigation Markup
include_once( get_stylesheet_directory() . '/inc/foundation/inc/navigation.php' );

// Grid Markup
include_once( get_stylesheet_directory() . '/inc/foundation/inc/grid.php' );

// Block Grid Markup
// require( get_stylesheet_directory() . '/inc/foundation/inc/block-grid.php' );

// Comments Markup
// require( get_stylesheet_directory() . '/inc/foundation/inc/forms.php' );

add_filter('post_class','remove_sticky_class');
// Fix .sticky Class Conflict Between WordPress and Foundation
function remove_sticky_class( $classes ) {
  $classes = array_diff($classes, array('sticky'));
  $classes[] = 'wordpress-sticky';
  return $classes;
}

