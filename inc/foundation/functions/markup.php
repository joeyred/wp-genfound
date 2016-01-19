<?php
/**
 * Main Markup File
 *
 * @package GenFound/Markup
 */

function genfound_markup() {

}

add_action( 'genesis_before', 'genfound_header_markup' );
/**
 * Header Markup
 *
 * @return void
 */
function genfound_header_markup() {
	if ( has_action( 'genesis_header' ) ) {

		remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
		add_action( 'genesis_header', 'genfound_header_markup_open', 5 );
		function genfound_header_markup_open() {

			genesis_markup( array(
				'html5'   => '<header %s><div class="' . genfound_markup_config( 'header', 'site-header' ) . '">',
				'xhtml'   => '<div id="header"><div class="' . genfound_markup_config( 'header', 'site-header' ) . '">',
				'context' => 'site-header',
			) );
		}

		remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
		add_action( 'genesis_header', 'genfound_header_markup_close', 15 );
		function genfound_header_markup_close() {

			genesis_markup( array(
				'html5' => '</div></header>',
				'xhtml' => '</div></div>',
			) );
		}

		add_filter( 'genesis_attr_title-area', 'genfound_title_area' );
		/**
		 * Add Column classes to title area
		 *
		 * @since  0.1.0
		 *
		 * @param  array $attributes element attrubutes.
		 *
		 * @return array             ammended attributes.
		 */
		function genfound_title_area( $attributes ) {

			$classes = genfound_markup_config( 'header', 'title-area' );

			$attributes['class'] .= $classes;

			return $attributes;
		}

		add_filter( 'genesis_attr_header-widget-area', 'genfound_header_widget_area' );
		/**
		 * Add Column classes to header widget area
		 *
		 * @since  0.1.0
		 *
		 * @param  array $attributes element attrubutes.
		 *
		 * @return array             ammended attributes.
		 */
		function genfound_header_widget_area( $attributes ) {

			$classes = genfound_markup_config( 'header', 'header-widget-area' );

			$attributes['class'] .= $classes;

			return $attributes;
		}
	}
}
add_action( 'genesis_before', 'genfound_page_layout_markup' );
function genfound_page_layout_markup() {

	$layout = genesis_site_layout();

	add_filter( 'genesis_attr_content-sidebar-wrap', 'genfound_content_sidebar_wrap' );
	/**
	 * Add columns classes to content sidebar wrap
	 *
	 * @since  0.1.0
	 *
	 * @param  array $attributes element attrubutes.
	 *
	 * @return array             ammended attributes.
	 */
	function genfound_content_sidebar_wrap( $attributes ) {

		$classes = genfound_markup_config( genesis_site_layout(), 'content-sidebar-wrap' );

		$attributes['class'] .= $classes;

		return $attributes;
	}
	add_filter( 'genesis_attr_content', 'genfound_main_content' );

	/**
	 * Add Row class to main content
	 *
	 * @since  0.1.0
	 *
	 * @param  array $attributes element attrubutes.
	 *
	 * @return array             ammended attributes.
	 */
	function genfound_main_content( $attributes ) {

		$classes = genfound_markup_config( genesis_site_layout(), 'content' );

		$attributes['class'] .= $classes;

		return $attributes;
	}

	if ( $layout !== 'full-width-content' ) {

		add_filter( 'genesis_attr_sidebar-primary', 'genfound_sidebar_primary' );
		/**
		 * Add column classes to primary sidebar
		 *
		 * @since  0.1.0
		 *
		 * @param  array $attributes element attrubutes.
		 *
		 * @return array             ammended attributes.
		 */
		function genfound_sidebar_primary( $attributes ) {

			$classes = genfound_markup_config( genesis_site_layout(), 'sidebar-primary' );

			$attributes['class'] .= $classes;

			return $attributes;
		}
	}

	if ( $layout === 'content-sidebar-sidebar' || $layout === 'sidebar-sidebar-content' || $layout === 'sidebar-content-sidebar' ) {

		// Reposition Secondary Sidebar to work with Grid Markup
		remove_action( 'genesis_sidebar_alt', 'genesis_get_sidebar_alt' );
		add_action( 'genesis_after_content', 'genesis_get_sidebar_alt' );

		add_filter( 'genesis_attr_sidebar-secondary', 'genfound_sidebar_secondary' );
		/**
		 * Add Row class to primary sidebar
		 *
		 * @since  0.1.0
		 *
		 * @param  array $attributes element attrubutes.
		 *
		 * @return array             ammended attributes.
		 */
		function genfound_sidebar_secondary( $attributes ) {

			$classes = genfound_markup_config( genesis_site_layout(), 'sidebar-secondary' );

			$attributes['class'] .= $classes;

			return $attributes;
		}
	}
}
