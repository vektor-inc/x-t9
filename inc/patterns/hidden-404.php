<?php
/**
 * 404 content.
 */
return array(
	'title'      => __( '404 Content', 'x-t9' ),
	'inserter'   => false,
	'categories' => array( 'pages' ),
	'content'    => '<!-- wp:paragraph {"align":"center"} -->
					<p class="has-text-align-center">' . esc_html__( 'This page could not be found. Maybe try a search?', 'x-t9' ) . '</p>
					<!-- /wp:paragraph -->
					<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
					<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
					<!-- /wp:spacer -->
					<!-- wp:search {"label":"Search","showLabel":false,"width":50,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center"} /-->',
);
