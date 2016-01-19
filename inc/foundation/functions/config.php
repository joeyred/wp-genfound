<?php
/**
 * Impliments all configuration files.
 *
 * This file contains all of the functions and actions required for getting the
 * proper configuration values to their proper place. This is so that the config
 * files remain easy to edit, while this file does most of the heavy lifting.
 *
 * @since  	0.1.0
 *
 * @package GenFound/Configuration
 * @author  Joey Red
 * @license GPL-2.0+
 * @link 	http://www.github.com/joeyred/wp-genfound
 */

/**
 * Check if theme supports flexbox grid
 *
 * @since  0.1.0
 *
 * @return boolean simple true or false value returned.
 */
function genfound_flex_grid_supported() {

	if ( current_theme_supports( 'genfound-flex-grid' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Checks which grid is currently supported and returns correct config file
 *
 * @since  0.1.0
 *
 * @return string grid configuration file name
 */
function genfound_get_grid() {

	if ( genfound_flex_grid_supported() === true ) {
		$grid_file = 'grid-config-flex.php';
	} else {
		$grid_file = 'grid-config-float.php';
	}

	return $grid_file;
}

/**
 * Takes in values that correspond to config settings array and returns a sting with
 * the correct html class.
 *
 * @since  0.1.0
 *
 * @param  string $section the key value for the proper array within the `$classes` array.
 * @param  string $element the element that is the name of the key in the section array.
 * @return string          The HTML classes as pulled from the config.
 */
function genfound_markup_config( $section, $element ) {

	// Include correct file path for currently supported grid
	include_once( get_stylesheet_directory() . '/inc/foundation/config/' . genfound_get_grid() );

	$classes = genfound_grid_config_settings();

	$output = $classes[$section][$element];

	return ' ' . $output;
}


