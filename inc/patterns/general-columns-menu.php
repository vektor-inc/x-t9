<?php
/**
 * Columns Menu Section
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Columns Menu Section', 'x-t9' ),
	'categories' => array( 'featured', 'media', 'columns' ),
	'content'    => '<!-- wp:columns {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-columns" style="margin-top:0;margin-bottom:0"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
	<!-- /wp:image -->
	
	<!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:heading {"level":5} -->
	<h5 id="vk-blocks">Title Text</h5>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
	<!-- /wp:image -->
	
	<!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:heading {"level":5} -->
	<h5 id="vk-blocks">Title Text</h5>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
	<!-- /wp:image -->
	
	<!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:heading {"level":5} -->
	<h5 id="vk-blocks">Title Text</h5>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
	<!-- /wp:image -->
	
	<!-- wp:spacer {"className":"is-style-spacer-md"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:heading {"level":5} -->
	<h5 id="vk-blocks">Title Text</h5>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:spacer {"className":"is-style-spacer-xl"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xl"></div>
	<!-- /wp:spacer -->
	',
);
