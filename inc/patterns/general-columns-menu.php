<?php
/**
 * Columns Menu Section
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Columns Menu', 'x-t9' ),
	'categories' => array( 'featured', 'media' ),
	'content'    => '<!-- wp:columns -->
	<div class="wp-block-columns">
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt="" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'Title Text', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	</div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt="" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'Title Text', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt="" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'Title Text', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt="" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'Title Text', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	</div>
	<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- wp:spacer {"height":"","className":"is-style-spacer-xl"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-xl"></div>
	<!-- /wp:spacer -->',
);
