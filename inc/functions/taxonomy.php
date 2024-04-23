<?php
/**
 * For custom posts.
 *
 * @package for-now
 */

if ( ! function_exists( 'fn_get_term_ids' ) ) :

	/**
	 * Get taxonomy id array.
	 *
	 * @param string $slug taxonomy slug.
	 * @param array  $exclude exclude taxonomy slug array.
	 */
	function fn_get_term_ids( $slug = null, $exclude = array() ) {
		if ( is_null( $slug ) ) {
			return array();
		}

		$terms = get_terms( $slug );

		return array_map(
			function ( $term ) {
				return $term->term_id;
			},
			array_filter(
				$terms,
				function ( $term ) use ( $exclude ) {
					return ! in_array( $term->slug, $exclude, true );
				}
			)
		);
	}

endif;
