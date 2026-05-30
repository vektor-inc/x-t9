<?php
/**
 * Typography control defaults for the block editor.
 *
 * ブロックエディタの Inspector で、フォントファミリー・フォントサイズ・
 * 外観（太さ / スタイル）・行の高さ・文字間隔の各コントロールをデフォルト表示にする。
 * 通常はパネル右の3点メニューから個別に表示する必要があるが、
 * これらを毎回開かなくても使えるように block_type_metadata で
 * supports.typography.__experimentalDefaultControls を補完する。
 *
 * @package vektor-inc/x-t9
 */

/**
 * Show font family / size / appearance / line height / letter spacing by default in the editor inspector.
 *
 * タイポグラフィをサポートしているブロックすべてを対象に、
 * ブロック自身が宣言しているサポート範囲内で
 * __experimentalDefaultControls の対象項目を true にする。
 * サポートしていない項目はそもそも表示されないため副作用は最小。
 *
 * @param array $metadata Block metadata as read from block.json.
 * @return array Modified block metadata.
 */
function xt9_typography_default_controls( $metadata ) {
	// タイポグラフィをサポートしないブロックは対象外。
	// Skip blocks that don't declare typography support.
	if ( empty( $metadata['supports']['typography'] ) || ! is_array( $metadata['supports']['typography'] ) ) {
		return $metadata;
	}

	$typography = $metadata['supports']['typography'];

	// ブロックが既にサポートしている項目だけをデフォルト表示対象にする。
	// Only default-show the controls the block actually supports.
	$defaults = array();

	if ( ! empty( $typography['fontSize'] ) ) {
		$defaults['fontSize'] = true;
	}
	if ( ! empty( $typography['lineHeight'] ) ) {
		$defaults['lineHeight'] = true;
	}
	if ( ! empty( $typography['__experimentalFontFamily'] ) ) {
		$defaults['fontFamily'] = true;
	}
	// 「外観」ドロップダウンは fontStyle と fontWeight の統合 UI で、
	// Gutenberg 側のキーは fontAppearance（個別の fontStyle / fontWeight ではない）。
	// The Appearance dropdown is a unified UI for fontStyle and fontWeight;
	// Gutenberg checks `fontAppearance`, not the individual keys.
	if ( ! empty( $typography['__experimentalFontStyle'] ) || ! empty( $typography['__experimentalFontWeight'] ) ) {
		$defaults['fontAppearance'] = true;
	}
	if ( ! empty( $typography['__experimentalLetterSpacing'] ) ) {
		$defaults['letterSpacing'] = true;
	}

	if ( empty( $defaults ) ) {
		return $metadata;
	}

	// 既存の __experimentalDefaultControls とマージし、対象項目は上書きで表示にする。
	// Merge with existing defaults; our keys win to enforce visibility.
	$existing = ( isset( $typography['__experimentalDefaultControls'] ) && is_array( $typography['__experimentalDefaultControls'] ) )
		? $typography['__experimentalDefaultControls']
		: array();

	$metadata['supports']['typography']['__experimentalDefaultControls'] = array_merge( $existing, $defaults );

	return $metadata;
}
add_filter( 'block_type_metadata', 'xt9_typography_default_controls' );
