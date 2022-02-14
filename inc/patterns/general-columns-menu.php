<?php
/**
 * Columns Menu
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Columns Menu', 'x-t9' ),
	'categories' => array( 'featured', 'media' ),
	'content'    => '<!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/logo_VK_Blocks.png" alt="' . esc_attr__( 'VK Blocks', 'x-t9' ) . '" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'VK Blocks', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Plugin VK Blocks (free) is a block library that adds various blocks and styles and functions that are useful for building your business websites.', 'x-t9' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="https://wordpress.org/plugins/vk-blocks/" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	<!-- wp:spacer {"height":30} -->
	<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/logo_VK_Block_Patterns.png" alt="' . esc_attr__( 'VK Block Patterns', 'x-t9' ) . '" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'VK Block Patterns', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Plugin VK Block Patterns (free) is is a block pattern library to easily create a business site.', 'x-t9' ) . '<br>' . esc_html__( 'You can also easily register your own patterns.', 'x-t9' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="https://wordpress.org/plugins/vk-block-patterns/" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	<!-- wp:spacer {"height":30} -->
	<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/logo_VK_Filter_Search.png" alt="' . esc_attr__( 'VK Filter Search', 'x-t9' ) . '" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'VK Filter Search', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'Plugin VK Filter Search (free) can create the Filter Serach Block on your edit screen. It enable to filter search on post type and terms.', 'x-t9' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="https://wordpress.org/plugins/vk-filter-search" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	<!-- wp:spacer {"height":30} -->
	<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/logo_ExUnit.png" alt="' . esc_attr__( 'ExUnit', 'x-t9' ) . '" /></figure>
	<!-- /wp:image -->
	
	<!-- wp:heading {"level":5,"style":{"spacing":{"margin":{"top":"1.5rem","bottom":"1rem"}}}} -->
	<h5 id="vk-blocks" style="margin-top:1.5rem;margin-bottom:1rem">' . esc_html__( 'ExUnit', 'x-t9' ) . '</h5>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>' . esc_html__( 'By using the multi-function plug-in "VK All in One Expansion Unit (free)", you can use the various useful functions and rich widgets.', 'x-t9' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"0.3em","bottom":"0.3em","left":"1em","right":"1em"}}},"className":"is-style-outline","fontSize":"small"} -->
	<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" href="https://wordpress.org/plugins/vk-all-in-one-expansion-unit/" style="padding-top:0.3em;padding-right:1em;padding-bottom:0.3em;padding-left:1em">' . esc_html__( 'Read more', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons -->
	
	<!-- wp:spacer {"height":30} -->
	<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->',
);
