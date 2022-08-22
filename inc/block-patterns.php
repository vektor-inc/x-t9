<?php
/**
 * X-T9: Block Patterns
 *
 * @since X-T9 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since X-T9 1.0
 *
 * @return void
 */
function x29_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'x-t9' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'x-t9' ) ),
		'header'   => array( 'label' => __( 'Headers', 'x-t9' ) ),
		'query'    => array( 'label' => __( 'Query', 'x-t9' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'x-t9' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since X-T9 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'x29_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'footer-bg-dark',
		'footer-bg-dark-3col',
		'footer-bg-bright',
		'footer-bg-bright-3col',
		'footer-bg-bright-logo-nav-float',
		'footer-bg-bright-center-nav',
		'header/desc--contact__logo--nav',
		'header/desc--sns__logo--nav-contact',
		'header/logo__nav__center',
		'header/logo---nav---contact',
		'header/logo-nav---contact',
		'header/logo-title--sns-contact__nav',
		'hidden-404',
		'query-image-left',
		'query-subcontent',
		'post-template-image-left',
		'post-template-subcontent',
		'general-columns-menu',
		'general-featured-media-and-text',
		'general-featured-post-list',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since X-T9 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'x29_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'x-t9/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'x29_register_block_patterns', 9 );
