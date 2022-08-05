<?php
/**
 * Footer BG Bright Logo Nav Float
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Bright Logo Nav Float', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:group {"backgroundColor":"bg-light-gray","textColor":"text-normal"} -->
	<div class="wp-block-group has-text-normal-color has-bg-light-gray-background-color has-text-color has-background"><!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:site-logo {"width":200} /-->
	
	<!-- wp:navigation {"showSubmenuIcon":false,"className":"is-style-nav\u002d\u002dtext-inline nav\u002d\u002dopen\u002d\u002dlg-up","layout":{"type":"flex","orientation":"horizontal","justifyContent":"right","flexWrap":"nowrap"},"fontSize":"small"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:separator {"align":"full","backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:group {"textColor":"text-secondary","className":"mt-0","layout":{"inherit":true}} -->
	<div class="wp-block-group mt-0 has-text-secondary-color has-text-color"><!-- wp:spacer {"className":"is-style-spacer-xs"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
	<p class="has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);
