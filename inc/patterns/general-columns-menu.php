<?php
/**
 * Columns Menu Section
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Columns Menu Section', 'x-t9' ),
	'categories' => array( 'featured', 'media', 'columns' ),
	'content'    => '<!-- wp:cover {"overlayColor":"white","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
	<div class="wp-block-cover alignfull is-light" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><span aria-hidden="true" class="wp-block-cover__background has-white-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group"><!-- wp:spacer {"height":"","className":"is-style-spacer-xl"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-xl"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:columns {"className":"vk_block-margin-0\u002d\u002dmargin-bottom"} -->
	<div class="wp-block-columns vk_block-margin-0--margin-bottom"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
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
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
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
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
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
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/sample-image-gray.png" alt=""/></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'Title text', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:spacer {"height":"","className":"is-style-spacer-xl"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-xl"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:group --></div></div>
	<!-- /wp:cover -->',
);
