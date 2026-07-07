<?php
/**
 * Workaround for a WordPress core style print-order bug (WP 7.0 / 7.0.1).
 *
 * WordPress 7.0 で追加された「ブロック単位の追加CSS」機能に起因する、
 * スタイル出力順序の不具合に対する暫定対応。
 *
 * @package vektor-inc/x-t9
 */

/**
 * Force the `wp-block-library` style handle to always print before `global-styles`.
 *
 * WordPress 7.0 introduced the block-level "Additional CSS" feature
 * ( wp-includes/block-supports/custom-css.php ). When a block on the page uses it,
 * core registers a new style handle like this:
 *
 *     wp_register_style( 'wp-block-custom-css', false, array( 'global-styles' ) );
 *
 * Declaring `global-styles` as a dependency of `wp-block-custom-css` causes
 * WP_Dependencies::do_items() to print `global-styles` earlier than it otherwise
 * would (right before `wp-block-custom-css`). However `wp-block-library`
 * ( wp-includes/css/dist/block-library/style.css, which contains WordPress core's
 * own static fallback values such as `--wp--preset--font-size--huge: 42px;` ) is not
 * part of that dependency chain, so it keeps its original queue position and ends up
 * printing AFTER `global-styles` on pages that contain a block with Additional CSS set.
 * Because both stylesheets declare the same CSS custom properties at the same
 * specificity ( `:root` ), the one printed last wins — so the theme's fluid
 * typography `clamp()` values from theme.json get silently overwritten by core's
 * static fallback values (e.g. a huge heading renders at a fixed 42px instead of the
 * intended fluid size). This has been reproduced on both WordPress 7.0 and the 7.0.1
 * beta as of 2026-07 and is a WordPress core bug unrelated to this theme's theme.json.
 *
 * WordPress 7.0 で追加された「ブロック単位の追加CSS」機能を使うブロックが
 * ページ内に存在すると、コアが上記のように `wp-block-custom-css` を
 * `global-styles` に依存させて登録する。この依存関係により
 * WP_Dependencies::do_items() が `global-styles` を通常より早いタイミングで
 * 出力してしまうが、`wp-block-library`
 * （静的フォールバック値 `--wp--preset--font-size--huge: 42px;` などを含む
 * wp-includes/css/dist/block-library/style.css）はこの依存グラフに含まれていない
 * ため、キューの元の位置のまま出力される。結果として追加CSSブロックが存在する
 * ページだけ `wp-block-library` が `global-styles` より後に出力されてしまい、
 * 同じ `:root` カスタムプロパティが「後勝ち」でコアの静的値に上書きされ、
 * テーマの theme.json で定義したフルードタイポグラフィの clamp() 値が効かなくなる
 * （見出しが固定 42px 等で表示される）。2026年7月時点で WordPress 7.0 の正式版・
 * 7.0.1 のベータ版いずれでも再現し、x-t9 の theme.json 側の問題ではない
 * WordPress core 側の不具合である。
 *
 * The fix here does not touch print order directly. It simply declares the
 * dependency that should have existed all along: `wp-block-library` is added as an
 * explicit dependency of `global-styles`. This way, whenever something pulls
 * `global-styles` forward in the queue, `wp-block-library` is pulled forward together
 * with it (and printed first, since it's a dependency), so `wp-block-library` is
 * always guaranteed to print before `global-styles` — regardless of whether the
 * "Additional CSS" block support is used on the page, and regardless of whether this
 * WordPress core bug exists at all in a given WordPress version. This keeps the
 * function idempotent and harmless if the core bug is fixed upstream in the future.
 *
 * 出力順序そのものを直接いじるのではなく、本来あるべき依存関係
 * 「`wp-block-library` は `global-styles` より先に出力される」を明示的に
 * 追加するだけの対応とする。これにより、何らかの理由で `global-styles` が
 * キューの先頭側に引き上げられた場合でも、その依存元である `wp-block-library`
 * も連動して一緒に引き上げられ、常に `wp-block-library` → `global-styles` の
 * 順序が保たれる。「追加CSS」ブロックの有無や、将来 WordPress core 側で
 * この不具合が修正されたかどうかに関わらず安全に動作する（冪等）。
 *
 * @return void
 */
function xt9_fix_global_styles_print_order() {
	$wp_styles = wp_styles();

	// Bail if either handle isn't registered yet.
	// classic themes ( wp_is_block_theme() === false ) or certain edge cases may not
	// register `global-styles` at all, so this must not assume the handle exists.
	//
	// いずれかのハンドルが未登録の場合は何もしない。
	// クラシックテーマ（ wp_is_block_theme() が false ）等では `global-styles`
	// ハンドル自体が存在しない可能性があるため、存在確認を必須とする。
	if ( ! $wp_styles->query( 'global-styles', 'registered' ) || ! $wp_styles->query( 'wp-block-library', 'registered' ) ) {
		return;
	}

	$global_styles = $wp_styles->registered['global-styles'];

	// Already declared (e.g. some other code already added it, or this ran twice).
	// Keeps the function idempotent.
	//
	// 既に依存関係が追加されている場合は何もしない（冪等性の確保）。
	if ( in_array( 'wp-block-library', (array) $global_styles->deps, true ) ) {
		return;
	}

	$global_styles->deps[] = 'wp-block-library';
}
/*
 * Hook into `wp_enqueue_scripts` at a priority late enough that both
 * `wp_common_block_scripts_and_styles()` (registers/enqueues `wp-block-library`) and
 * `wp_enqueue_global_styles()` (registers `global-styles`) — both hooked at the
 * default priority 10 — have already run.
 *
 * `wp_common_block_scripts_and_styles()`（ `wp-block-library` を登録・enqueue する）
 * と `wp_enqueue_global_styles()`（ `global-styles` を登録する）は、いずれも
 * デフォルトの優先度10で `wp_enqueue_scripts` にフックされている。この2つの処理が
 * 両方完了した後に実行されるよう、それより遅い優先度でフックする。
 */
add_action( 'wp_enqueue_scripts', 'xt9_fix_global_styles_print_order', 20 );
