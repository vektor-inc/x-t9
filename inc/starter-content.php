<?php
add_action( 'after_setup_theme', 'xt9_add_starter_content' );
if ( is_customize_preview() ) {
	add_theme_support( 'starter-content', xt9_add_starter_content() );
}
function xt9_add_starter_content() {
	$starter_content = array(
		'posts'   => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => 'HOME',
				'thumbnail'    => '{{image-opening}}',
				'post_content' => join(
					'',
					array(
						'<!-- wp:pattern {"slug":"x-t9/general-featured-media-and-text"} /-->	
						<!-- wp:spacer -->
						<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
						<!-- /wp:spacer -->
						<!-- wp:pattern {"slug":"x-t9/general-columns-menu"} /-->
						<!-- wp:pattern {"slug":"x-t9/query-media"} /-->
						<!-- wp:pattern {"slug":"x-t9/general-featured-post-list"} /-->',
					)
				),
			),
			'about',
			'contact',
			'information',
		),
		'options' => array(
			'show_on_front'               => 'page',
			'page_on_front'               => '{{front}}',
			'page_for_posts'              => '{{information}}',
			'xt9_lightning_theme_options' => array(
				'layout' => array(
					'front-page' => 'lp',
				),
			),
		),
	);
	return $starter_content;
}
