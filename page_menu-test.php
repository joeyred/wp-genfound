<?php
/**
 * This file adds the Landing template to the Altitude Pro Theme.
 *
 * @package GenFound/Debug
 */

/*
Template Name: Menu Test
*/

add_action( 'genesis_before_entry', 'genfound_menu_test_debug');

function genfound_menu_test_debug() {

   /**
	* Displays a navigation menu
	*
	* @param array       Arguments
	*/
	// wp_nav_menu( array(
	// 	'theme_location' => 'test',
	// 	'menu' => '',
	// 	'container' => false,
	// 	'container_class' => '',
	// 	'container_id' => '',
	// 	'menu_class' => 'menu',
	// 	'menu_id' => '',
	// 	'echo' => true,
	// 	'fallback_cb' => false,
	// 	'before' => '',
	// 	'after' => '',
	// 	'link_before' => '',
	// 	'link_after' => '',
	// 	'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	// 	'depth' => 5,
	// 	'walker' => new Genfound_Menu_Walker(),
	// ));

	genfound_menu_component( 'accordion', 'test' );

	genfound_menu_component( 'dropdown', 'test' );
}

add_action( 'genesis_after_entry', 'genfound_menu_test_debug_after');

function genfound_menu_test_debug_after() {

	genfound_menu_component( 'drilldown', 'test' );


}

genesis();