<?php
/**
 * Functions for Building Foundation Menus
 *
 * @package GenFound/Markup
 */

/**
 * Build foundation menu component and pass through `wp_nav_menu()`.
 *
 * Supported values for `$component` are:
 *
 *  - `drilldown`,
 *  - `accordion`,
 *  - `dropdown`.
 *
 * @param  string $component      the name of the foundation component the function should build.
 * @param  string $theme_location registered theme menu to output.
 * @return void
 */
function genfound_menu_component( $component, $theme_location ) {

	$args = array(
		'theme_location'  	=> $theme_location,
		'menu' 			  	=> '',
		'container' 	  	=> false,
		'container_class' 	=> '',
		'container_id' 	  	=> '',
		'menu_class' 		=> 'menu',
		'menu_id' 			=> '',
		'echo' 				=> true,
		'fallback_cb' 		=> false,
		'before' 			=> '',
		'after' 			=> '',
		'link_before' 		=> '',
		'link_after' 		=> '',
		'items_wrap' 		=> '',
		'depth' 			=> 0,
		'walker' 			=> new Genfound_Menu_Walker(),
		'submenu_class' 	=> 'menu'
	);

	if ( $component === 'drilldown' ) {

		$attributes = 'data-drilldown';
		$args['menu_class'] .= ' vertical';
		$args['submenu_class'] .= ' vertical';
	}

	if ( $component === 'accordion' ) {

		$attributes = 'data-accordion-menu';
		$args['menu_class'] .= ' vertical';
		$args['submenu_class'] .= ' vertical nested';
	}

	if ( $component === 'dropdown' ) {

		$attributes = 'data-dropdown-menu';
		$args['menu_class'] .= ' dropdown';
	}

	$args['items_wrap'] = '<ul id="%1$s" class="%2$s" ' . $attributes . '>%3$s</ul>';

    wp_nav_menu( $args );
}

/**
 * Nav Menu Walker
 */
class Genfound_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Submenu markup genorator
	 * @param  string  $output original output of walker class fucntion.
	 * @param  integer $depth   determine how many submenus allowed in tree.
	 * @param  array   $args    arguments from `wp_nav_menu( $args )`.
	 * @return void
	 */
	 function start_lvl(&$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"$args->submenu_class\">\n";
    }
}











