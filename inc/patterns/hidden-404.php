<?php
/**
 * 404 content.
 */
return array(
	'title'    => __( '404 content', 'x-t9' ),
	'inserter' => false,
	'content'  => '<!-- wp:heading {"textAlign":"center","level":1,"align":"full","backgroundColor":"bg-light-gray"} -->
	<h1 class="alignfull has-text-align-center has-bg-light-gray-background-color has-background" id="404-not-found">' . esc_html( _x( '404', 'Error code for a webpage that is not found.', 'x-t9' ) ) . '</h1>
					<!-- /wp:heading -->
					<!-- wp:spacer -->
					<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->
					<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">' . esc_html__( 'This page could not be found. Maybe try a search?', 'x-t9' ) . '</p>
					<!-- /wp:paragraph -->
					<!-- wp:search {"label":"Search","showLabel":false,"width":50,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center"} /--><!-- wp:spacer -->
					<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
					<!-- /wp:spacer -->',
);
