<?php
/**
 * For url.
 *
 * @package for-now
 */

/**
 * [go-home]
 */
add_shortcode(
	'home-url',
	function () {
		return esc_url( get_home_url() );
	}
);

/**
 * [prev-url]
 */
add_shortcode(
	'prev-url',
	function () {
		if ( ! isset( $_SERVER['HTTP_HOST'] ) ) {
			return '';
		}

		if ( ! isset( $_SERVER['HTTP_REFERER'] ) ) {
			return '';
		}

		$host    = esc_url_raw( wp_unslash( $_SERVER['HTTP_HOST'] ) );
		$referer = esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) );

		if ( ! empty( $_SERVER['HTTP_REFERER'] ) && ( strpos( $referer, $host ) !== false ) ) {
			return esc_url( wp_unslash( $referer ) );
		}
		return '';
	}
);

/**
 * [page-url slug="page-slug"]
 */
add_shortcode(
	'page-url',
	function ( $atts ) {
		if ( ! empty( $atts ) && isset( $atts['slug'] ) ) {
			return fn_get_url_by_slug( $atts['slug'] );
		}
		return '';
	}
);

/**
 * [theme-url]
 */
add_shortcode(
	'theme-url',
	function () {
		return get_template_directory_uri();
	}
);
