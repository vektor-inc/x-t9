<?php
/**
 * Nav Float with header top contact
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Nav Float with header top contact', 'x-t9' ),
	'categories' => array( 'header' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"bottom":"0.75rem"}}},"layout":{"inherit":true}} -->
	<div class="wp-block-group" style="padding-bottom:0.75rem"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:site-tagline {"textColor":"text-bright","fontSize":"x-small"} /-->
	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"0.2rem","bottom":"0.2rem","left":"2rem","right":"2rem"}}},"fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link" style="border-radius:0px;padding-top:0.2rem;padding-right:2rem;padding-bottom:0.2rem;padding-left:2rem">Contact</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"right":"2rem"}}}} -->
	<div class="wp-block-group" style="padding-right:2rem"><!-- wp:site-logo {"width":220} /--></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"5px","bottom":"5px"}}}} -->
	<div class="wp-block-group" style="padding-top:5px;padding-bottom:5px"><!-- wp:navigation {"className":"nav\u002d\u002dactive-border-bottom","layout":{"type":"flex","justifyContent":"left","orientation":"horizontal","flexWrap":"wrap"}} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
	
	<!-- wp:separator {"opacity":"css","backgroundColor":"border-light","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-border-light-color has-css-opacity has-border-light-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->',
);
