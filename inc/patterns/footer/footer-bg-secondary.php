<?php
/**
 * Footer BG Secondary
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Secondary', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|primary","width":"2px"}}},"backgroundColor":"bg-secondary","textColor":"text-normal","className":"has-text-color"} -->
	<div class="wp-block-group has-text-color has-text-normal-color has-bg-secondary-background-color has-background" style="border-top-color:var(--wp--preset--color--primary);border-top-width:2px"><!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group"><!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:site-logo {"width":200,"align":"center"} /-->
	
	<!-- wp:spacer {"height":"22px","className":"is-style-spacer-sm"} -->
	<div style="height:22px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:social-links {"iconColor":"text-secondary","iconColorValue":"rgba(0,0,0,0.5)","size":"has-normal-icon-size","style":{"spacing":{"blockGap":"1rem"}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
	<!-- /wp:social-links -->
	
	<!-- wp:spacer {"height":"22px","className":"is-style-spacer-md"} -->
	<div style="height:22px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"align":"full","style":{"border":{"top":{"color":"var:preset|color|border-normal","width":"1px"}}},"className":"mt-0","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull mt-0" style="border-top-color:var(--wp--preset--color--border-normal);border-top-width:1px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"textColor":"text-secondary","layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group has-text-secondary-color has-text-color" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:navigation {"showSubmenuIcon":false,"className":"is-style-nav\u002d\u002dtext-inline","fontSize":"x-small"} /-->
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
	<p class="has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);
