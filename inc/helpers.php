<?php
/**
 * Helper functions for various uses
 *
 * @package GenFound
 */
// add_action('genesis_before_header', 'genfound_file_parse' );
// function genfound_file_parse() {

// 	$file_name = 'app.min.js';
// 	$find = '.min';
// 	$pos = strpos( $file_name, $find );

// 	if ($pos === false) {
// 	    echo "The string '$find' was not found in the string '$file_name'";
// 	} else {
// 	    echo "The string '$find' was found in the string '$file_name'";
// 	    echo " and exists at position $pos";
// 	}
// }

/**
 * Get file extension
 *
 * @since 0.1.0
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
 * Check for a minified version of the file in the filepath passed.
 *
 * You can pass a filepath leading to a non-minified file and this function will check if a minified version of that file
 * exists, and, if so, that file will be enqueued. If the file in the filepath value referes to a minified file, the return
 * is what is passed with an added forward slash.
 *
 * @since 0.1.0
 *
 * @param  string $path relative filepath to script or stylesheet.
 *
 * @return string       revised filepath.
 */
function genfound_file_is_minified( $path ) {

	$path_parts = pathinfo( $path ); // Break out parts of the filepath and store.
	$dir_path = $path_parts['dirname']; // Path to file's parent directory.
	$file_name = $path_parts['filename']; // Filename without extension.
	$extension = $path_parts['extension']; // File extension.
	$check = strpos( $file_name, '.min' ); // Check if file passed is a minified file and store.

	if ( $check === false ) {

		if ( file_exists( __DIR__ . '/' . $dir_path . '/' . $file_name . '.min.' . $extension ) ) {
			$min = '.min.';
		} else {
			$min = '.';
		}
		$path = '/' . $dir_path . '/' . $file_name . $min . $extension;
	} else {

		$path = '/' . $path;
	}

	return $path;
}

/**
 * New Enqueue function that checks for minified files and properly enques them if available
 *
 * This function can be used in the place of both wp_enqueue_script and wp_enqueue_style in the exact same way you would use each one.
 * The only manjor difference is that only a relative filepath is required for $src. The full filepath to be linked with is automatically
 * generated inside this function.
 *
 * @since 0.1.0
 *
 * @param  string  $handle    Name used as a handle for the script or style.
 * @param  string  $src       Relative path to directory file is located in.
 * @param  array   $deps      Array of the handles of all the registered scripts that this script depends on, that is the scripts that must be loaded before this script.
 * @param  string  $ver       String specifying the script version number, if it has one, which is concatenated to the end of the path as a query string.
 * @param  boolean $in_footer If 'true' then the script is placed before the closing </body> tag.
 *
 * @return void
 */
function genfound_enqueue( $handle, $src, $deps = array(), $ver = false, $in_footer = true ) {

	$path_parts = pathinfo( $src );
	$type = $path_parts['extension'];

	if ( $type === 'js' ) {

		wp_enqueue_script( $handle, get_stylesheet_directory_uri() . genfound_file_is_minified( $src ), $deps, $ver, $in_footer );

	}

	if ( $type === 'css' ) {

		wp_enqueue_style( $handle, get_stylesheet_directory_uri() . genfound_file_is_minified( $src ) );
	}
}
