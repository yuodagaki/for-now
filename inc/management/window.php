<?php
/**
 * For admin window.
 *
 * @package for-now
 */

add_filter(
	'manage_pages_columns',
	function ( $columns ) {
		$columns['slug'] = 'スラッグ';
		return $columns;
	}
);

add_action(
	'manage_pages_custom_column',
	function ( $column_name, $post_id ) {
		if ( 'slug' === $column_name ) {
			$post = get_post( $post_id );
			$slug = $post->post_name;
			echo esc_attr( $slug );
		}
	},
	10,
	2
);

add_filter(
	'the_content',
	function ( $content ) {
		global $post;
		$remove_filter = false;
		$arr_types     = array( 'page' );
		$post_type     = get_post_type( $post->ID );
		if ( in_array( $post_type, $arr_types, true ) ) {
			$remove_filter = true;
		}
		if ( $remove_filter ) {
			remove_filter( 'the_content', 'wpautop' );
			remove_filter( 'the_excerpt', 'wpautop' );
		}
		return $content;
	},
	9
);
