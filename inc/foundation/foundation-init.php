<?php
/**
 * Main Foundation 6 file for merging Foundation 6 with Genesis
 *
 * @since 0.1.0
 * @package GenFound
 */

// Config
include_once( get_stylesheet_directory() . '/inc/foundation/functions/config.php' );

// Markup
include_once( get_stylesheet_directory() . '/inc/foundation/functions/markup.php' );

// Navigation
include_once( get_stylesheet_directory() . '/inc/foundation/functions/menu-walkers.php' );
include_once( get_stylesheet_directory() . '/inc/foundation/structure/navigation.php' );

add_filter('post_class','remove_sticky_class');
// Fix .sticky Class Conflict Between WordPress and Foundation
function remove_sticky_class( $classes ) {
  $classes = array_diff($classes, array('sticky'));
  $classes[] = 'wordpress-sticky';
  return $classes;
}

