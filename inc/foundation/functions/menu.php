<?php
/**
 * Functions for Building Foundation Menus
 *
 * @package GenFound/Markup
 */

function genfound_menu_config() {

	$menu = array(
		'bar' => array(
			'title-bar' => '',
			'top-bar' => ''
		),
		'container' => array(),
		'menu' => array(), 
		);
}

function genfound_nav_menu( $args ) {

}

function genfound_menu_component( $component, $orientation, $responsive_ats ) {

	$args = array(
		'theme_location' => 'test',
		'menu' => '',
		'container' => false,
		'container_class' => '',
		'container_id' => '',
		'menu_class' => 'menu',
		'menu_id' => '',
		'echo' => true,
		'fallback_cb' => false,
		'before' => '',
		'after' => '',
		'link_before' => '',
		'link_after' => '',
		'items_wrap' => '',
		'depth' => 5,
		'walker' => new Genfound_Menu_Walker(),
		'submenu_class' => 'menu'
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
	if ( $component === 'responsive' ) {

		$attributes = 'data-responsive-menu="' . $responsive_ats . '"';
		$args['walker'] = new Genfound_Responsive_Menu_Walker();
	}

	$args['items_wrap'] = '<ul id="%1$s" class="%2$s" ' . $attributes . '>%3$s</ul>';

    wp_nav_menu( $args );
}

class Genfound_Menu_Walker extends Walker_Nav_Menu {
	 function start_lvl(&$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"$args->submenu_class\">\n";
    }
}
class Genfound_Responsive_Menu_Walker extends Walker_Nav_Menu {
	 function start_lvl(&$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"$args->walker_arg\">\n";
    }
}

function genfound_drilldown_menu() {

	?>
	<ul class="menu">
		<li><a href="#">One</a></li>
		<li><a href="#">Two</a></li>
		<li><a href="#">Three</a></li>
		<li><a href="#">Four</a></li>
	</ul>
	<?php
}





