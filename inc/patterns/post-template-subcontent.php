<?php
/**
 * Post template subcontent
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'    => __( 'X-T9 Post subcontent', 'x-t9' ),
	'inserter' => false,
	'content'  => '
	<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group"><!-- wp:post-featured-image {"width":"60px","height":"60px"} /-->
	
	<!-- wp:group {"layout":{"type":"default"}} -->
	<div class="wp-block-group"><!-- wp:post-date {"textColor":"text-secondary-darkbg","fontSize":"x-small"} /-->
	
	<!-- wp:post-title {"level":6,"isLink":true,"className":"text-light ","fontSize":"small"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:separator {"backgroundColor":"border-normal-darkbg","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-border-normal-darkbg-color has-alpha-channel-opacity has-border-normal-darkbg-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	',
);
