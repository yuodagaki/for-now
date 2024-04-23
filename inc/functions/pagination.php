<?php
/**
 * For pagination.
 *
 * @package for-now
 */

if ( ! function_exists( 'fn_generate_pagination' ) ) :

	/**
	 * Generate url with params.
	 *
	 * @param string $url url.
	 * @param array  $query_params query params.
	 */
	function fn_generate_url( $url = '', $query_params = array() ) {
		if ( empty( $url ) || empty( $query_params ) ) {
			return '';
		}

		return esc_url(
			add_query_arg( $query_params, $url )
		);
	}

	/**
	 * Generate pagination.
	 *
	 * @param object $wp_query wp query object.
	 * @param int    $paged paged.
	 * @param string $url url.
	 * @param array  $query_params query params.
	 */
	function fn_generate_pagination( $wp_query = null, $paged = 1, $url = null, $query_params = array() ) {
		if ( is_null( $wp_query ) || is_null( $url ) ) {
			return '';
		}

		if ( 0 === $wp_query->post_count ) {
			return '';
		}

		$first = '';
		$pre   = '';
		$next  = '';
		$last  = '';

		if ( $paged > 2 ) {
			$query_params['page'] = 1;
			$first_url            = generate_url( $url, $query_params );

			$first .= <<<EOF
			<li class="Pagination-Item">
				<a class="Pagination-Item-Link" href="{$first_url}"><span>1</span></a>
			</li>
EOF;
		}

		if ( $paged > 3 ) {
			$first .= <<<EOF
			<li class="Pagination-Item">
				<a class="Pagination-Item-Link" href="#"><span>...</span></a>
			</li>
EOF;
		}

		if ( $paged > 1 ) {
			$pre_page             = $paged - 1;
			$query_params['page'] = $pre_page;
			$pre_url              = generate_url( $url, $query_params );

			$pre = <<<EOF
			<li class="Pagination-Item">
				<a class="Pagination-Item-Link" href="{$pre_url}"><span>{$pre_page}</span></a>
			</li>
EOF;
		}

		if ( $paged < $wp_query->max_num_pages ) {
			$next_page            = $paged + 1;
			$query_params['page'] = $next_page;
			$next_url             = generate_url( $url, $query_params );

			$next = <<<EOF
			<li class="Pagination-Item">
				<a class="Pagination-Item-Link" href="{$next_url}"><span>{$next_page}</span></a>
			</li>
EOF;

			if ( $next_page < $wp_query->max_num_pages - 1 ) {
				$next .= <<<EOF
				<li class="Pagination-Item">
					<a class="Pagination-Item-Link" href="#"><span>...</span></a>
				</li>
EOF;
			}
		}

		if ( $paged < $wp_query->max_num_pages - 1 ) {
			$query_params['page'] = $wp_query->max_num_pages;
			$max_url              = generate_url( $url, $query_params );
			$last                .= <<<EOF
			<li class="Pagination-Item">
				<a class="Pagination-Item-Link" href="{$max_url}"><span>{$wp_query->max_num_pages}</span></a>
			</li>
EOF;
		}

		return <<<EOF
		<ul class="Pagination">
			{$first}
			{$pre}
			<li class="Pagination-Item">
				<a class="Pagination-Item-Link isActive" href="#"><span>{$paged}</span></a>
			</li>
			{$next}
			{$last}
		</ul>
EOF;
	}

endif;
