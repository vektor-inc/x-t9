<?php
/**
 * Footer BG Dark
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Dark', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|primary","width":"2px"}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"bg-dark","className":"has-text-normal-darkbg-color has-text-color"} -->
	<div class="wp-block-group has-text-normal-darkbg-color has-text-color has-bg-dark-background-color has-background" style="border-top-color:var(--wp--preset--color--primary);border-top-width:2px;margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:1.5rem;padding-bottom:1.5rem"><!-- wp:image {"align":"center","width":180,"sizeSlug":"full","linkDestination":"media"} -->
	<figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/x-t9-logo-yoko-white-trans.png" alt="" width="180"/></figure>
	<!-- /wp:image -->
	
	<!-- wp:social-links {"iconColor":"text-dark-bg","iconColorValue":"rgba( 255,255,255,0.6 )","size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
	<!-- /wp:social-links --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"align":"full","style":{"border":{"top":{"color":"var:preset|color|border-normal-darkbg","width":"1px"}}},"className":"mt-0","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull mt-0" style="border-top-color:var(--wp--preset--color--border-normal-darkbg);border-top-width:1px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:navigation {"textColor":"text-secondary-darkbg","showSubmenuIcon":false,"overlayMenu":"never","className":"is-style-nav\u002d\u002dtext-inline","layout":{"type":"flex","justifyContent":"center"},"fontSize":"x-small"} /-->
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"text-secondary-darkbg","fontSize":"x-small"} -->
	<p class="has-text-align-center has-text-secondary-darkbg-color has-text-color has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);
