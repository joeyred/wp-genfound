<?php
/**
 * Float Grid configuration for Genesis Markup
 *
 * @since  0.1.0
 *
 * @package  GenFound/Foundation/Markup
 * @author  Joey Red
 * @license GPL-2.0+
 */

function genfound_grid_config_settings() {

	$classes = array(

		'header' => array( // Genesis Header
			'site-header' 		 => 'row',
			'title-area' 		 => 'small-12 medium-6 columns',
			'header-widget-area' => 'small-12 medium-6 columns'
		),
		// PAGE LAYOUTS
		'content-sidebar' => array(
			'content-sidebar-wrap' => 'row',
			'content' 			   => 'large-9 columns',
			'sidebar-primary' 	   => 'large-3 columns'
		),
		'sidebar-content' => array(
			'content-sidebar-wrap' => 'row',
			'content' 			   => 'large-9 large-push-3 columns',
			'sidebar-primary' 	   => 'large-3 large-pull-9 columns'
		),
		'content-sidebar-sidebar' => array(
			'content-sidebar-wrap' => 'row',
			'content' 			   => 'large-7 columns',
			'sidebar-primary' 	   => 'large-3 columns',
			'sidebar-secondary'	   => 'large-2 columns'
		),
		'sidebar-sidebar-content' => array(
			'content-sidebar-wrap' => 'row',
			'content' 			   => 'large-7 large-push-5 columns',
			'sidebar-primary' 	   => 'large-3 large-pull-7 columns',
			'sidebar-secondary'	   => 'large-2 large-pull-7 columns'
		),
		'sidebar-content-sidebar' => array(
			'content-sidebar-wrap' => 'row',
			'content' 			   => 'large-7 large-push-3 columns',
			'sidebar-primary' 	   => 'large-3 large-pull-7 columns',
			'sidebar-secondary'	   => 'large-2 columns'
		),
		'full-width-content' => array(
			'content-sidebar-wrap' => 'row',
			'content' 			   => 'small-12 columns',
		)
	);

	return $classes;
}
