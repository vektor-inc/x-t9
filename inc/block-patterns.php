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
function xt9_register_block_patterns() {
	$block_pattern_categories = array(
		'featured'    => array( 'label' => _x( 'Featured', 'Pattern Category', 'x-t9' ) ),
		'header'      => array( 'label' => _x( 'Headers', 'Pattern Category', 'x-t9' ) ),
		'footer'      => array( 'label' => _x( 'Footers', 'Pattern Category', 'x-t9' ) ),
		'sidebar'     => array( 'label' => _x( 'Sidebars', 'Pattern Category', 'x-t9' ) ),
		'layout'      => array( 'label' => _x( 'Layout', 'Pattern Category', 'x-t9' ) ),
		'query'       => array( 'label' => _x( 'Query', 'Pattern Category', 'x-t9' ) ),
		'pages'       => array( 'label' => _x( 'Pages', 'Pattern Category', 'x-t9' ) ),
		'pr-contents' => array( 'label' => _x( 'PR Contents', 'Pattern Category', 'x-t9' ) ),
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
	$block_pattern_categories = apply_filters( 'xt9_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'pr-contents/columns-menu',
		'layout/sidebar-right',
		'featured/featured-columns-menu',
		'featured/featured-hero-media-and-text',
		'featured/featured-post-list',
		'footer/footer-bg-dark',
		'footer/footer-bg-dark-3col',
		'footer/footer-bg-secondary',
		'footer/footer-bg-secondary-3col',
		'footer/footer-bg-secondary-logo-nav-float',
		'footer/footer-bg-secondary-center-nav',
		'header/desc--sns__logo--nav-contact',
		'header/logo__desc__nav__center',
		'header/logo---nav---contact',
		'header/logo-nav---contact',
		'header/logo-title--sns-contact__nav',
		'hidden-404',
		'sidebar/sidebar-post-category-and-archive',
		'query-image-left',
		'query-subcontent',
		'post-template-image-left', // used by loop-archive.html.
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since X-T9 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'xt9_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'x-t9/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'xt9_register_block_patterns', 9 );
