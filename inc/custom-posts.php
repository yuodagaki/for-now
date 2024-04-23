<?php
/**
 * For custom posts setting.
 *
 * @package for-now
 */

add_action(
	'init',
	function () {
		register_post_type(
			'custom-posts',
			array(
				'label'        => 'カスタムポスト',
				'hierarchical' => false,
				'public'       => true,
				'query_var'    => false,
				'has_archive'  => true,
				'rewrite'      => array( 'slug' => 'customs/custom-posts' ),
				'supports'     => array(
					'title',
					'editor',
					'thumbnail',
				),
			)
		);

		register_taxonomy(
			'custom-posts-tag',
			'dictionaries',
			array(
				'label'        => 'カスタムポストのタグ',
				'hierarchical' => false,
			)
		);
	}
);
