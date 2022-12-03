<?php
add_action( 'after_setup_theme', 'xt9_add_starter_content' );
if ( is_customize_preview() ) {
	add_theme_support( 'starter-content', xt9_add_starter_content() );
}
function xt9_add_starter_content() {
	$starter_content = array(
		'posts'     => array(
			'front'   => array(
				'post_type'    => 'page',
				'post_title'   => 'HOME',
				'thumbnail'    => '{{image-opening}}',
				'post_content' => join(
					'',
					array(
						'',
					)
				),
			),
			'about',
			'contact',
			'blog',
			'sitemap' => array(
				'post_type'    => 'page',
				'post_title'   => __( 'Site Map', 'lightning' ),
				'post_name'    => 'sitemap',
				'post_content' => join(
					'',
					array(
						'<!-- wp:vk-blocks/sitemap /-->',
					)
				),
			),
		),
		'options'   => array(
			'show_on_front'              => 'page',
			'page_on_front'              => '{{front}}',
			'page_for_posts'             => '{{blog}}',
		)
	);
	return $starter_content;
}
