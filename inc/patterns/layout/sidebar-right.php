<?php
/**
 * Sidebar Layout
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Sidebar Layout', 'x-t9' ),
	'categories' => array( 'layout' ),
	'content'    => '<!-- wp:columns {"className":"is-style-main-layout"} -->
	<div class="wp-block-columns is-style-main-layout"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:heading -->
	<h2>' . esc_html__( 'Main Column', 'x-t9' ) . '</h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"className":"is-style-main-layout-sidebar"} -->
	<div class="wp-block-column is-style-main-layout-sidebar"><!-- wp:heading {"level":4,"className":"is-style-title-sub-col"} -->
	<h4 class="is-style-title-sub-col">' . esc_html__( 'Side Column', 'x-t9' ) . '</h4>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->

	<!-- wp:spacer {"className":"is-style-spacer-xl"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xl"></div>
	<!-- /wp:spacer -->
	',
);
