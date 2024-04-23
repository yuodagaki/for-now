<?php
/**
 * Enqueue CSS, JS.
 *
 * @package for-now
 */

/**
 * Enqueue CSS, JS function.
 */
function fn_enqueue_scripts() {
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/reset.css' ) );
	wp_enqueue_style( 'base', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime( get_stylesheet_directory() . '/assets/css/style.css' ) );
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css', array(), '6.1.2' );

	// for header.
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', false );

	// for footer.
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/js/app.js' ), true );
}

add_action( 'wp_enqueue_scripts', 'fn_enqueue_scripts' );
