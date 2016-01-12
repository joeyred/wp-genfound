<?php
/**
 * Flex Box Grid configuration for Genesis Markup
 *
 * @package  GenFound/Foundation/Markup
 * @author  Joey Red
 * @license GPL-2.0+
 */

function genfound_grid_config_settings() {

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

	return $classes;
}