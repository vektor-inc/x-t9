<?php
/**
 * Featured Hero Media and Text Section
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Hero Media and Text', 'x-t9' ),
	'categories' => array( 'featured', 'pr-contents' ),
	'content'    => '<!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/x-t9-featured-sky.jpg","hasParallax":true,"dimRatio":20,"overlayColor":"black","minHeight":0,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}}} -->
	<div class="wp-block-cover alignfull is-light has-parallax" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-20 has-background-dim"></span><div role="img" class="wp-block-cover__image-background has-parallax" style="background-position:50% 50%;background-image:url(' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/x-t9-featured-sky.jpg)"></div><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
	<div class="wp-block-group"><!-- wp:columns {"className":"mb-0"} -->
	<div class="wp-block-columns mb-0"><!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textColor":"white","className":"is-style-vk-heading-plain"} -->
	<h2 class="is-style-vk-heading-plain has-white-color has-text-color">' . esc_html__( 'Let\'s embark on a new journey', 'x-t9' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"textColor":"white"} -->
	<p class="has-white-color has-text-color"><meta charset="utf-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","width":100,"className":"is-style-outline"} -->
	<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link has-white-color has-text-color wp-element-button">Start editing the site</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"right","sizeSlug":"full","linkDestination":"none"} -->
	<figure class="wp-block-image alignright size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/x-t9-icon-large-trans.png" alt=""/></figure>
	<!-- /wp:image --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group --></div></div>
	<!-- /wp:cover -->',
);
