<?php
/**
 * X-T9: Block Patterns
 *
 * @since X-T9 1.0
 */

if ( ! function_exists( 'xt9_register_block_pattern_categories' ) ) :
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
	function xt9_register_block_pattern_categories() {
		$block_pattern_categories = array(
			'featured'           => array( 'label' => _x( 'Featured', 'Pattern Category', 'x-t9' ) ),
			'header'             => array( 'label' => _x( 'Headers', 'Pattern Category', 'x-t9' ) ),
			'footer'             => array( 'label' => _x( 'Footers', 'Pattern Category', 'x-t9' ) ),
			'navigation-overlay' => array( 'label' => _x( 'Navigation Overlay', 'Pattern Category', 'x-t9' ) ),
			'sidebar'            => array( 'label' => _x( 'Sidebars', 'Pattern Category', 'x-t9' ) ),
			'layout'             => array( 'label' => _x( 'Layout', 'Pattern Category', 'x-t9' ) ),
			'query'              => array( 'label' => _x( 'Query', 'Pattern Category', 'x-t9' ) ),
			'pages'              => array( 'label' => _x( 'Pages', 'Pattern Category', 'x-t9' ) ),
			'flow'               => array( 'label' => _x( 'Flow', 'Pattern Category', 'x-t9' ) ),
			'pricing'            => array( 'label' => _x( 'Pricing', 'Pattern Category', 'x-t9' ) ),
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
	add_action( 'init', 'xt9_register_block_pattern_categories', 9 );
endif;

// 旧バージョンの x-t9 では、パターン本体を register_block_pattern() で require する
// xt9_register_block_patterns() を init( 優先度 9 )にフックしていた。
// その旧バージョンから作られた子テーマが旧 functions.php / block-patterns.php を複製していると、
// 子テーマ側で同関数が init にフックされ、すでに削除済みの古いパターンファイルを require して
// Fatal Error になる恐れがある。子テーマは親テーマより先に読み込まれるため、ここでフックを
// 除去しておくことで、その旧関数が実行されるのを防ぐ。
//
// In old x-t9 versions, xt9_register_block_patterns() registered the patterns by
// require-ing each pattern file and was hooked to init ( priority 9 ). A child theme
// created from such an old version may still hook that function and try to require
// pattern files that no longer exist, causing a fatal error. Child themes load before
// the parent, so removing the hook here prevents that legacy function from running.
remove_action( 'init', 'xt9_register_block_patterns', 9 );
