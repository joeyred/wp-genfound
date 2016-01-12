<?php
/**
 * Grid configuration for Genesis Markup
 *
 * @package  GenFound/Foundation/Markup
 * @author  Joey Red
 * @license GPL-2.0+
 */

function genfound_which_grid() {

	$grid_type = true;

	if ( $grid_type === true ) {
		$grid_file = 'grid-config-flex.php';
	} else {
		$grid_file = 'grid-config-float.php';
	}

	return $grid_file;
}

function genfound_markup_config( $section, $element ) {

	include_once( get_stylesheet_directory() . '/inc/foundation/inc/config/' . genfound_which_grid() )
	
	$classes = array(

		'header' => array( // Genesis Header
			'site-header' 		 => 'row',
			'title-area' 		 => 'small-12 medium-6 large-5 columns',
			'header-widget-area' => 'small-12 medium-6 large-7 columns'
		),
		// PAGE LAYOUTS
		'content-sidebar' => array(),
		'sidebar-content' => array(),
		'content-sidebar-sidebar' => array(),
		'sidebar-sidebar-content' => array(),
		'sidebar-content-sidebar' => array(),
		'full-width-content' => array()
	);

	$output = $classes[$section][$element];

	return ' ' . $output;
}