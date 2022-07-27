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
	'content'    => '
	<!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	<!-- wp:group {"backgroundColor":"bg-black","textColor":"text-normal-darkm"} -->
	<div class="wp-block-group has-text-normal-darkbg-color has-bg-black-background-color has-text-color has-background"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem"}}},"layout":{"inherit":true}} -->
	<div class="wp-block-group" style="padding-top:1.5rem;padding-bottom:1.5rem"><!-- wp:image {"align":"center","width":180,"sizeSlug":"full","linkDestination":"media"} -->
	<figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/x-t9-logo-yoko-white-trans.png" alt="" width="180"/></figure>
	<!-- /wp:image -->
	
	<!-- wp:social-links {"iconColor":"text-dark-bg","iconColorValue":"rgba( 255,255,255,0.6 )","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1rem"}}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
	<!-- /wp:social-links --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"className":"mt-0","layout":{"inherit":true}} -->
	<div class="wp-block-group mt-0"><!-- wp:separator {"opacity":"css","backgroundColor":"border-normal-darkbg","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-border-normal-darkbg-color has-css-opacity has-border-normal-darkbg-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:navigation {"textColor":"text-secondary-darkbg","overlayMenu":"never","className":"nav\u002d\u002dtext-inline nav\u002d\u002ddarkbg","layout":{"type":"flex","justifyContent":"center"},"fontSize":"x-small"} /-->

	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"text-secondary-darkbg","fontSize":"x-small"} -->
	<p class="has-text-align-center has-text-secondary-darkbg-color has-text-color has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);
