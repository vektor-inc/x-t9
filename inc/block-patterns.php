<?php
/**
 * X-T9: Block Patterns
 *
 * @since X-T9 1.0
 */

/**
 * Registers block pattern categories.
 *
 * パターン本体は WordPress 標準の /patterns ディレクトリから自動登録されるため、
 * ここではカテゴリーのラベル登録のみを行う。
 *
 * Pattern files themselves are auto-registered by WordPress core from the
 * theme's /patterns directory, so this only registers the category labels.
 *
 * @since X-T9 1.0
 *
 * @return void
 */
function xt9_register_block_patterns() {
	$block_pattern_categories = array(
		'featured'           => array( 'label' => _x( 'Featured', 'Pattern Category', 'x-t9' ) ),
		'header'             => array( 'label' => _x( 'Headers', 'Pattern Category', 'x-t9' ) ),
		'footer'             => array( 'label' => _x( 'Footers', 'Pattern Category', 'x-t9' ) ),
		'navigation-overlay' => array( 'label' => _x( 'Navigation Overlay', 'Pattern Category', 'x-t9' ) ),
		'sidebar'            => array( 'label' => _x( 'Sidebars', 'Pattern Category', 'x-t9' ) ),
		'layout'             => array( 'label' => _x( 'Layout', 'Pattern Category', 'x-t9' ) ),
		'query'              => array( 'label' => _x( 'Query', 'Pattern Category', 'x-t9' ) ),
		'pages'              => array( 'label' => _x( 'Pages', 'Pattern Category', 'x-t9' ) ),
		'pr-contents'        => array( 'label' => _x( 'PR Contents', 'Pattern Category', 'x-t9' ) ),
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
}
add_action( 'init', 'xt9_register_block_patterns', 9 );
