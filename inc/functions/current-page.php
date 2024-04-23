<?php
/**
 * For current page.
 *
 * @package for-now
 */

if ( ! function_exists( 'fn_get_current_page_slug' ) ) :
	/**
	 * Get current page slug.
	 */
	function fn_get_current_page_slug() {
		$slug = '';

		if ( is_home() ) {
			return $slug;
		}

		$page = get_post( get_the_ID() );

		if ( $page && $page->post_parent ) {
			$slug = get_post( $page->post_parent )->post_name;
		} elseif ( $page ) {
			$slug = $page->post_name;
		}

		return $slug;
	}
endif;

if ( ! function_exists( 'fn_get_url_by_slug' ) ) :
	/**
	 * Get url by slug.
	 *
	 * @param string $slug slug.
	 */
	function fn_get_url_by_slug( $slug ) {
		$page = get_page_by_path( $slug );
		if ( empty( $page ) ) {
			return '';
		}
		return esc_url( get_permalink( get_page_by_path( $slug )->ID ) );
	}
endif;
