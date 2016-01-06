<?php
/**
 * Helper functions for various uses
 *
 * @package GenFound
 */

/**
 * Get file extension
 *
 * @param  string $path filepath to image.
 *
 * @return string       file extension
 */
function genfound_get_extension( $path ) {

	$file_info = pathinfo( $path );

	$ext = $file_info['extension'];

	return $ext;
}

/**
 * Check if File is Minified
 *
 * @param  string $dir_path  relative path to directory file is located in.
 * @param  string $file_name name of the file without its extention.
 * @param  string $extension files extension.
 *
 * @return string            file path to correct minified or non-minified file
 */
function genfound_is_minified( $dir_path, $file_name, $extension ) {

	if ( file_exists( __DIR__ . '/' . $dir_path . '/' . $file_name . '.min.' . $extension ) ) {
		$min = '.min.';
	} else {
		$min = '.';
	}

	return '/' . $dir_path . '/' . $file_name . $min . $extension;
}

/**
 * Detects normal or minified file and correctly enqueues it
 *
 * REQUIRED FOR SCRIPTS AND STYLES
 * @param  string  $type      Tell the function what is being enqued. accepted values are 'script' and 'style'.
 * @param  string  $name      Name used as a handle for the script or style.
 * @param  string  $dir_path  Relative path to directory file is located in.
 * @param  string  $file_name Name of the file without its extension.
 *
 * REQUIRED ONLY FOR SCRIPTS
 * @param  array   $deps      Array of the handles of all the registered scripts that this script depends on, that is the scripts that must be loaded before this script.
 * @param  string  $ver       String specifying the script version number, if it has one, which is concatenated to the end of the path as a query string.
 * @param  boolean $in_footer If 'true' then the script is placed before the closing </body> tag.
 *
 * @return void
 */
function genfound_enqueue( $type, $name, $dir_path, $file_name, $deps = array(), $ver = false, $in_footer = true ) {

	if ( $type === 'script' ) {

		$extension = 'js';

		wp_enqueue_script( $name, get_stylesheet_directory_uri() . genfound_is_minified( $dir_path, $file_name, $extension ), $deps, $ver, $in_footer );

	}

	if ( $type === 'style' ) {

		$extension = 'css';

		wp_enqueue_style( $name, get_stylesheet_directory_uri() . genfound_is_minified( $dir_path, $file_name, $extension ) );
	}
}