<?php
/**
 * Layout helpers.
 *
 * @package vektor-inc/x-t9
 */

/**
 * Append is-layout-custom class to blocks with custom widths.
 *
 * @param string $block_content Block HTML.
 * @param array  $block Parsed block data.
 * @return string
 */
function xt9_add_layout_custom_class( $block_content, $block ) {
	$target_blocks = array( 'core/group', 'core/cover' );

	if ( empty( $block['blockName'] ) || ! in_array( $block['blockName'], $target_blocks, true ) ) {
		return $block_content;
	}

	$layout = $block['attrs']['layout'] ?? array();
	if ( ! is_array( $layout ) ) {
		return $block_content;
	}

	$content_size = isset( $layout['contentSize'] ) ? trim( (string) $layout['contentSize'] ) : '';
	$wide_size    = isset( $layout['wideSize'] ) ? trim( (string) $layout['wideSize'] ) : '';

	if ( '' === $content_size && '' === $wide_size ) {
		return $block_content;
	}

	if ( empty( $block_content ) ) {
		return $block_content;
	}

	if ( class_exists( 'WP_HTML_Tag_Processor' ) ) {
		$tags = new WP_HTML_Tag_Processor( $block_content );
		if ( $tags->next_tag() ) {
			$tags->add_class( 'is-layout-custom' );
			return $tags->get_updated_html();
		}
		return $block_content;
	}

	if ( preg_match( '/class="[^"]*"/', $block_content ) ) {
		return preg_replace( '/class="([^"]*)"/', 'class="$1 is-layout-custom"', $block_content, 1 );
	}

	return $block_content;
}
add_filter( 'render_block', 'xt9_add_layout_custom_class', 10, 2 );

/**
 * Load block editor helpers.
 *
 * @return void
 */
function xt9_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'xt9-editor-layout',
		get_template_directory_uri() . '/assets/js/editor-layout.js',
		array( 'wp-hooks', 'wp-element' ),
		XT9_THEME_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'xt9_enqueue_block_editor_assets' );

/**
 * Enable the "Fixed" option in the core Position dropdown for the Group block.
 *
 * グループブロックの「位置」ドロップダウンにコア標準の Fixed 項目を表示する。
 * core/group の block.json では supports.position.sticky のみ true で fixed は未設定のため、
 * block_type_metadata フィルターで supports.position.fixed を true にして補う。
 * クラス出力（is-position-fixed）やインライン CSS の生成はコア側が処理するので、
 * テーマでは別途 CSS を用意する必要はない。
 *
 * @param array $metadata Block metadata as read from block.json.
 * @return array Modified block metadata.
 */
function xt9_enable_group_fixed_position( $metadata ) {
	// 対象は core/group のみ。
	// Only target the core/group block.
	if ( ! isset( $metadata['name'] ) || 'core/group' !== $metadata['name'] ) {
		return $metadata;
	}

	// supports / supports.position が未定義のケースに備えて初期化する。
	// Initialize in case supports / supports.position is missing.
	if ( ! isset( $metadata['supports'] ) || ! is_array( $metadata['supports'] ) ) {
		$metadata['supports'] = array();
	}
	if ( ! isset( $metadata['supports']['position'] ) || ! is_array( $metadata['supports']['position'] ) ) {
		$metadata['supports']['position'] = array();
	}

	$metadata['supports']['position']['fixed'] = true;

	return $metadata;
}
add_filter( 'block_type_metadata', 'xt9_enable_group_fixed_position' );
