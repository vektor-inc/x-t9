<?php
/**
 * Featured Media and Text
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Featured Media and text', 'x-t9' ),
	'categories' => array( 'featured', 'columns' ),
	'content'    => '<!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/t-29-featured-sky.jpg","id":8570,"dimRatio":20,"overlayColor":"black","minHeight":0,"isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"2rem","bottom":"1.5rem"}}}} -->
	<div class="wp-block-cover alignfull is-light" style="padding-top:2rem;padding-bottom:1.5rem"><span aria-hidden="true" class="has-black-background-color has-background-dim-20 wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-8570" alt="" src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/t-29-featured-sky.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group"><!-- wp:columns {"className":"mb-0"} -->
	<div class="wp-block-columns mb-0"><!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textColor":"white","className":"is-style-vk-heading-plain"} -->
	<h2 class="is-style-vk-heading-plain has-white-color has-text-color">' . esc_html__( 'Let\'s embark on a new journey', 'x-t9' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph {"textColor":"white"} -->
	<p class="has-white-color has-text-color"><meta charset="utf-8">' . esc_html__( 'WordPress Theme The X-T9 is a block theme that supports the full site editing function.', 'x-t9' ) . '<br>' . esc_html__( 'You can flexible customize headers, footers, post elements, etc. that were not easy until now.', 'x-t9' ) . '</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:buttons -->
	<div class="wp-block-buttons"><!-- wp:button {"textColor":"white","width":100,"className":"is-style-outline"} -->
	<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link has-white-color has-text-color">' . esc_html__( 'Start editing the site', 'x-t9' ) . '</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"verticalAlignment":"center"} -->
	<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"right","sizeSlug":"full","linkDestination":"none"} -->
	<div class="wp-block-image"><figure class="alignright size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/inc/patterns/images/t-29-icon-large-trans.png" alt="" class=""/></figure></div>
	<!-- /wp:image --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group --></div></div>
	<!-- /wp:cover -->',
);
