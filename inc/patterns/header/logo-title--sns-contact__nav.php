<?php
/**
 * Logo - Site title -- ( SNS | Contact ) / Nav
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Logo - Site title -- ( SNS - Contact ) / Nav', 'x-t9' ),
	'categories' => array( 'header' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"left":"0rem","right":"0rem"}}},"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group alignfull" style="padding-right:0rem;padding-left:0rem"><!-- wp:group {"layout":{"type":"default"}} -->
	<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"className":"site-logo\u002d\u002dset","layout":{"type":"flex","allowOrientation":false,"flexWrap":"nowrap","justifyContent":"left"}} -->
	<div class="wp-block-group site-logo--set" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:site-logo {"width":60,"className":"auto-size"} /-->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:site-title /-->
	
	<!-- wp:site-tagline {"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"className":"d-sm-up","fontSize":"x-small"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|30","padding":{"bottom":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40)"><!-- wp:social-links {"iconColor":"text-secondary","iconColorValue":"rgba(0,0,0,0.5)","size":"has-small-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"className":"is-style-logos-only d-md-up","layout":{"type":"flex","justifyContent":"right"}} -->
	<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only d-md-up"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
	<!-- /wp:social-links -->
	
	<!-- wp:group -->
	<div class="wp-block-group"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"primary","style":{"spacing":{"padding":{"top":"0rem","bottom":"0rem"}}},"fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="padding-top:0rem;padding-bottom:0rem">' . esc_html__( 'Contact', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:navigation {"className":"nav\u002d\u002dopen\u002d\u002dlg-up nav\u002d\u002dfirst-nowrap is-style-nav\u002d\u002dactive-border-bottom","layout":{"type":"flex","justifyContent":"right","orientation":"horizontal","flexWrap":"nowrap"},"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"x-small"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide" style="margin-top:0;margin-bottom:0"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"backgroundColor":"bg-primary","className":"is-style-scrolled-header-fixed","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group is-style-scrolled-header-fixed has-bg-primary-background-color has-background"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:site-logo {"width":60,"className":"auto-size","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} /-->
	
	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}}} -->
	<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"right"}} -->
	<div class="wp-block-group" style="padding-top:0"><!-- wp:navigation {"className":"nav\u002d\u002dopen\u002d\u002dlg-up nav\u002d\u002dfirst-nowrap is-style-nav\u002d\u002dactive-border-bottom","layout":{"type":"flex","justifyContent":"right","orientation":"horizontal","flexWrap":"nowrap"},"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"x-small"} /-->
	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"},"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
	<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"primary","style":{"spacing":{"padding":{"top":"0rem","bottom":"0rem"}}},"fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button" style="padding-top:0rem;padding-bottom:0rem">' . esc_html__( 'Contact', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide" style="margin-top:0;margin-bottom:0"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->',
);
