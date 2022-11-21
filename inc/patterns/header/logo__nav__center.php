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
	'content'    => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"left":"0rem","right":"0rem"}}},"layout":{"inherit":true}} -->
	<div class="wp-block-group alignfull" style="padding-right:0rem;padding-left:0rem"><!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:site-logo {"width":200,"align":"center","className":"auto-size"} /-->
	
	<!-- wp:site-tagline {"textAlign":"center"} /-->
	
	<!-- wp:spacer {"height":"22px","className":"is-style-spacer-sm"} -->
	<div style="height:22px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:group {"className":"is-style-default   ","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group is-style-default"><!-- wp:navigation {"className":"nav\u002d\u002dopen\u002d\u002dlg-up nav\u002d\u002dactive-border-bottom"} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"align":"full","backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"backgroundColor":"base","className":"scrolled-header-fixed","layout":{"inherit":true}} -->
	<div class="wp-block-group scrolled-header-fixed has-base-background-color has-background"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:site-logo {"width":120,"className":"auto-size"} /-->
	
	<!-- wp:group -->
	<div class="wp-block-group"><!-- wp:navigation {"className":"nav\u002d\u002dopen\u002d\u002dlg-up nav\u002d\u002dactive-border-bottom"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"align":"full","backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->',
);
