<?php
/**
 * Editing of Genesis Header markup up to work with foundation.
 *
 * @since 0.1.0
 *
 * @package GenFound/Foundation/Markup
 */

add_filter( 'genesis_attr_site-header', 'genfound_site_header' );
/**
 * Add Row class to site header
 *
 * @since  0.1.0
 *
 * @param  array $attributes element attrubutes.
 *
 * @return array             ammended attributes.
 */
function genfound_site_header( $attributes ) {

	$classes = genfound_markup_config( 'header', 'site-header' );

	$attributes['class'] .= $classes;

	return $attributes;
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

