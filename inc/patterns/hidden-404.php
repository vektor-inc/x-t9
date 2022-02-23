<?php
/**
 * 404 content.
 */
return array(
	'title'    => __( '404 content', 'x-t9' ),
	'inserter' => false,
	'content'  => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"backgroundColor":"bg-light-gray","className":"page-header"} -->
					<div class="wp-block-group alignfull page-header has-bg-light-gray-background-color has-background" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:group {"layout":{"inherit":true}} -->
					<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"top":"1.25em","right":"0em","bottom":"1.25em","left":"0em"}}},"backgroundColor":"bg-light-gray"} -->
					<h1 class="has-text-align-center has-bg-light-gray-background-color has-background" id="404-not-found" style="margin-top:1.25em;margin-right:0em;margin-bottom:1.25em;margin-left:0em">' . esc_html( _x( '404', 'Error code for a webpage that is not found.', 'x-t9' ) ) . '</h1>
					<!-- /wp:heading --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group -->

					<!-- wp:spacer {"height":80} -->
					<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">' . esc_html__( 'This page could not be found. Maybe try a search?', 'x-t9' ) . '</p>
					<!-- /wp:paragraph -->
					<!-- wp:search {"label":"Search","showLabel":false,"width":50,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center"} /--><!-- wp:spacer -->
					<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->',
);
