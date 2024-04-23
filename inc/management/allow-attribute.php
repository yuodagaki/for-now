<?php
/**
 * For allow attribute.
 *
 * @package for-now
 */

add_filter(
	'wp_kses_allowed_html',
	function ( $tags ) {
		$tags['source']['srcset'] = true;
		return $tags;
	},
	10,
	2
);
