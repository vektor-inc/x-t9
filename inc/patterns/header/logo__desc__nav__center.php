<?php
/**
 * Logo / Description / Nav
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Logo / Description / Nav', 'x-t9' ),
	'categories' => array( 'header' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}},"border":{"bottom":{"color":"var:preset|color|border-normal","width":"1px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignfull" style="border-bottom-color:var(--wp--preset--color--border-normal);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:site-logo {"width":200,"align":"center","className":"auto-size","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"var:preset|spacing|40","left":"0"}}}} /-->
	
	<!-- wp:site-tagline {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"fontSize":"small"} /-->
	
	<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"}}},"className":"is-style-default   ","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"},"fontSize":"small"} -->
	<div class="wp-block-group is-style-default has-small-font-size" style="margin-top:0;margin-bottom:0"><!-- wp:navigation {"className":"is-style-nav\u002d\u002dactive-border-bottom"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"bg-primary","className":"is-style-scrolled-header-fixed","layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group is-style-scrolled-header-fixed has-bg-primary-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:site-logo {"width":120,"className":"auto-size","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} /-->
	
	<!-- wp:group -->
	<div class="wp-block-group"><!-- wp:navigation {"className":"nav\u002d\u002dopen\u002d\u002dlg-up is-style-nav\u002d\u002dactive-border-bottom","fontSize":"small"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide" style="margin-top:0;margin-bottom:0"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->',
);
