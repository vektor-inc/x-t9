<?php
/**
 * Post template image left
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'    => __( 'X-T9 Post image at left', 'x-t9' ),
	'inserter' => false,
	'content'  => '<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-top" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:column {"verticalAlignment":"top","width":"33.33%"} -->
	<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:33.33%"><!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"1px"}},"borderColor":"border-normal"} /--></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"verticalAlignment":"top","width":"66.66%"} -->
	<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:66.66%"><!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0rem"}}}} /-->
	
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"textColor":"text-secondary","layout":{"type":"flex","allowOrientation":false}} -->
	<div class="wp-block-group has-text-secondary-color has-text-color" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0"><!-- wp:post-date {"style":{"spacing":{"margin":{"top":"0"}}}} /-->
	
	<!-- wp:post-terms {"term":"category","prefix":"' . esc_html__( 'Category : ', 'x-t9' ) . '"} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:post-excerpt {"moreText":"' . esc_html__( 'Read more', 'x-t9' ) . '","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","right":"0","bottom":"0","left":"0"}}}} /--></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:separator {"className":"has-text-color has-background has-border-normal-background-color is-style-wide"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity has-text-color has-background has-border-normal-background-color is-style-wide"/>
	<!-- /wp:separator -->',
);

