<?php
/**
 * Functions.php
 *
 * @package for-now
 */

if ( ! function_exists( 'fn_load_files' ) ) :

	/**
	 * Load files
	 */
	function fn_load_files() {
		$functions_paths  = glob( get_template_directory() . '/inc/functions/*.php' );
		$management_paths = glob( get_template_directory() . '/inc/management/*.php' );
		$shortcodes_paths = glob( get_template_directory() . '/inc/shortcodes/*.php' );

		$paths = array_merge( $functions_paths, $management_paths, $shortcodes_paths );

		foreach ( $paths as $path ) {
			require $path;
		}
	}

endif;

fn_load_files();

/**
 * カスタムポスト
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * JS & CSS
 */
require get_template_directory() . '/inc/enqueue-scripts.php';
