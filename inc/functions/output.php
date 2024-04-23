<?php
/**
 * For output.
 *
 * @package for-now
 */

if ( ! function_exists( 'fn_mb_trimwidth_words' ) ) :
	/**
	 * Trim width words.
	 *
	 * @param string $text target.
	 * @param int    $width length.
	 * @param string $more end text.
	 */
	function fn_mb_trimwidth_words( $text = '', $width = 100, $more = '...' ) {
		return mb_strimwidth( $text, 0, $width, $more );
	}
endif;
