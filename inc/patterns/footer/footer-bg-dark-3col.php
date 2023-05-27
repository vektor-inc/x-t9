<?php
/**
 * Footer BG Dark 3col
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Dark 3columns', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|primary","width":"2px"}}},"backgroundColor":"bg-dark","textColor":"text-normal-darkbg"} -->
	<div class="wp-block-group has-text-normal-darkbg-color has-bg-dark-background-color has-text-color has-background" style="border-top-color:var(--wp--preset--color--primary);border-top-width:2px;margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:group -->
	<div class="wp-block-group"><!-- wp:image {"width":180,"sizeSlug":"full","linkDestination":"media"} -->
	<figure class="wp-block-image size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/logo-sample-darkbg.png" alt="" width="180"/></figure>
	<!-- /wp:image -->
	
	<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<p style="margin-top:var(--wp--preset--spacing--40)">ZIP 000-0000<br>Address here prefecture <br>City address 0-0-0<br>TEL : 000-000-0000</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:social-links {"iconColor":"text-normal-darkbg","iconColorValue":"rgba( 255,255,255,0.8 )","size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40","bottom":"0","right":"0","left":"0"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:0;margin-left:0"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
	<!-- /wp:social-links --></div>
	<!-- /wp:group --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|border-normal-darkbg","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border-normal-darkbg);border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"color":{"background":"#00000000"}},"textColor":"text-normal-darkbg"} -->
	<h4 class="has-text-normal-darkbg-color has-text-color has-background" style="background-color:#00000000;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">' . esc_html__( 'Service', 'x-t9' ) . '</h4>
	<!-- /wp:heading --></div>
	<!-- /wp:group -->
	
	<!-- wp:navigation {"textColor":"text-normal-darkbg","showSubmenuIcon":false,"overlayMenu":"never","className":"is-style-nav\u002d\u002dvertical-with-hr","layout":{"type":"flex","orientation":"vertical"},"fontSize":"x-small"} /--></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:group -->
	<div class="wp-block-group"><!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|border-normal-darkbg","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border-normal-darkbg);border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"color":{"background":"#00000000"}},"textColor":"text-normal-darkbg"} -->
	<h4 class="has-text-normal-darkbg-color has-text-color has-background" style="background-color:#00000000;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">' . esc_html__( 'Information', 'x-t9' ) . '</h4>
	<!-- /wp:heading --></div>
	<!-- /wp:group -->
	
	<!-- wp:query {"queryId":1,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]}} -->
	<div class="wp-block-query"><!-- wp:post-template -->
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
	<!-- /wp:post-template -->
	
	<!-- wp:query-no-results -->
	<!-- wp:paragraph {"textColor":"text-normal-darkbg"} -->
	<p class="has-text-normal-darkbg-color has-text-color">No posts.</p>
	<!-- /wp:paragraph -->
	<!-- /wp:query-no-results --></div>
	<!-- /wp:query --></div>
	<!-- /wp:group --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"align":"full","style":{"border":{"top":{"color":"var:preset|color|border-normal-darkbg","width":"1px"}}},"className":"mt-0","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull mt-0" style="border-top-color:var(--wp--preset--color--border-normal-darkbg);border-top-width:1px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:navigation {"textColor":"text-secondary-darkbg","overlayMenu":"never","className":"is-style-nav\u002d\u002dtext-inline","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"},"fontSize":"x-small"} /-->
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"text-secondary-darkbg","fontSize":"x-small"} -->
	<p class="has-text-align-center has-text-secondary-darkbg-color has-text-color has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);
