<?php
/**
 * Description -- Contact / Logo -- Nav
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Description -- Contact / Logo -- Nav', 'x-t9' ),
	'categories' => array( 'header' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content'    => '<!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:site-tagline {"textColor":"text-secondary","fontSize":"x-small"} /-->
	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"0.2rem","bottom":"0.2rem","left":"2rem","right":"2rem"}}},"fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link" style="border-radius:0px;padding-top:0.2rem;padding-right:2rem;padding-bottom:0.2rem;padding-left:2rem">Contact</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"5px"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="padding-bottom:5px"><!-- wp:group {"style":{"spacing":{"padding":{"right":"2rem"}}}} -->
	<div class="wp-block-group" style="padding-right:2rem"><!-- wp:site-logo {"width":220} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"5px","bottom":"5px"}}}} -->
	<div class="wp-block-group" style="padding-top:5px;padding-bottom:5px"><!-- wp:navigation {"className":"nav\u002d\u002dopen\u002d\u002dlg-up nav\u002d\u002dfirst-nowrap is-style-nav\u002d\u002dactive-border-bottom","layout":{"type":"flex","justifyContent":"right","orientation":"horizontal","flexWrap":"nowrap"},"fontSize":"small"} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"align":"full","backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"backgroundColor":"white","className":"scrolled-header-fixed  ","layout":{"inherit":true}} -->
	<div class="wp-block-group scrolled-header-fixed has-white-background-color has-background"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}}} -->
	<div class="wp-block-group" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:site-logo {"width":220} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"5px","bottom":"5px"}}}} -->
	<div class="wp-block-group" style="padding-top:5px;padding-bottom:5px"><!-- wp:navigation {"className":"nav\u002d\u002dactive-border-bottom","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal","flexWrap":"wrap"}} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"align":"full","backgroundColor":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->',
);
