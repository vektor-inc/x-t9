<?php
/**
 * Featured Post List Section
 *
 * 固定ページに貼り付け用です。アーカイブペジ用ではありません。
 * This Pattern is for Page.
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Post List Section', 'x-t9' ),
	'categories' => array( 'featured' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"bg-secondary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull has-bg-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:spacer {"className":"is-style-spacer-lg"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="has-text-align-center" id="information">' . esc_html__( 'Information', 'x-t9' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group"><!-- wp:separator {"opacity":"css","backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-border-normal-color has-css-opacity has-border-normal-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:query {"queryId":9,"query":{"perPage":"2","pages":"0","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"displayLayout":{"type":"list","columns":3},"layout":{"inherit":false}} -->
	<div class="wp-block-query"><!-- wp:post-template -->
	<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
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
	<!-- /wp:separator -->
	<!-- /wp:post-template -->
	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"0"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:0"><!-- wp:button {"fontSize":"x-small"} -->
	<div class="wp-block-button has-custom-font-size has-x-small-font-size"><a class="wp-block-button__link wp-element-button" href="' . esc_url( get_post_type_archive_link( 'post' )  ) . '">' . esc_html__( 'Information list', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:query --></div>
	<!-- /wp:group -->
	
	<!-- wp:spacer {"className":"is-style-spacer-lg"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:group -->',
);
