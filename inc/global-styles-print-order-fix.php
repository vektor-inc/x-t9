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
 * Force the `wp-block-library` style handle to always print before `global-styles`,
 * but only when `wp-block-library` is actually going to be printed anyway.
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
 * IMPORTANT — do not force-load a dequeued `wp-block-library`:
 * WP_Dependencies::do_items() resolves dependencies via all_deps(), which pulls in
 * any *registered* dependency of a queued handle regardless of whether that
 * dependency was itself enqueued. That means merely checking
 * `query( 'wp-block-library', 'registered' )` is not enough: if some plugin or child
 * theme intentionally calls `wp_dequeue_style( 'wp-block-library' )` for performance
 * reasons, simply registering it as a dependency of `global-styles` would defeat that
 * dequeue and force `wp-block-library` to load again on every page — a regression this
 * theme must not introduce. To avoid that, this function only adds the dependency when
 * `wp-block-library` is actually going to be printed anyway, i.e. when
 * `query( 'wp-block-library', 'enqueued' )` returns true (directly enqueued, or already
 * pulled in via some other handle's dependency chain).
 *
 * 【重要】dequeue 済みの wp-block-library を強制ロードしないための対応:
 * WP_Dependencies::do_items() は all_deps() で依存関係を解決する際、
 * キューに入っているハンドルの依存先が「登録されているだけ」であれば、
 * それが実際に enqueue されたかどうかに関わらず出力対象に引き込んでしまう。
 * そのため `query( 'wp-block-library', 'registered' )` だけでは不十分で、
 * パフォーマンス目的で `wp_dequeue_style( 'wp-block-library' )` を呼んでいる
 * プラグイン・子テーマが存在した場合、その dequeue を無効化して
 * wp-block-library を強制的に再ロードしてしまう副作用が起きる。
 * これを避けるため、`wp-block-library` が「どのみち出力される」状態
 * （ `query( 'wp-block-library', 'enqueued' )` が true。直接 enqueue 済み、
 * または他のハンドルの依存関係経由で既に読み込まれる状態を含む）の場合のみ
 * 依存関係を追加する。
 *
 * @return void
 */
function xt9_fix_global_styles_print_order() {
	$wp_styles = wp_styles();

	// Bail if `global-styles` isn't registered.
	// classic themes ( wp_is_block_theme() === false ) or certain edge cases may not
	// register `global-styles` at all, so this must not assume the handle exists.
	//
	// global-styles が未登録の場合は何もしない。
	// クラシックテーマ（ wp_is_block_theme() が false ）等では `global-styles`
	// ハンドル自体が存在しない可能性があるため、存在確認を必須とする。
	if ( ! $wp_styles->query( 'global-styles', 'registered' ) ) {
		return;
	}

	// Bail unless wp-block-library is registered AND actually going to be printed
	// (directly enqueued, or pulled in via another handle's dependency chain).
	// If it has been explicitly dequeued (e.g. by a performance-focused plugin or
	// child theme) and nothing else needs it, leave it dequeued — do not force it
	// back in just to fix the print order of a style that would not be printed anyway.
	//
	// wp-block-library が登録済みかつ「どのみち出力される」状態
	// （直接 enqueue 済み、または他ハンドル経由で読み込まれる）でない場合は何もしない。
	// 明示的に dequeue されていて他に読み込む理由もない場合は、その dequeue を
	// 尊重し、出力順序の都合だけで強制的に復活させない。
	if ( ! $wp_styles->query( 'wp-block-library', 'registered' ) || ! $wp_styles->query( 'wp-block-library', 'enqueued' ) ) {
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
 * Hook as late as possible before styles are actually printed, so that the
 * `enqueued` check above reflects the final queue state — including any
 * `wp_dequeue_style( 'wp-block-library' )` call made by another plugin or child
 * theme at any priority on `wp_enqueue_scripts`.
 *
 * `wp_enqueue_scripts` itself fires on `wp_head` at priority 1, and core prints
 * styles via `wp_print_styles()` on `wp_head` at priority 8. Hooking at `wp_head`
 * priority 7 runs after the entire `wp_enqueue_scripts` action (and therefore after
 * any dequeue calls within it) has completed, but still before printing.
 *
 * スタイルが実際に出力される直前まで判定を遅らせることで、上記の `enqueued`
 * チェックが最終的なキュー状態（他のプラグイン・子テーマが `wp_enqueue_scripts`
 * のどの優先度で `wp_dequeue_style( 'wp-block-library' )` を呼んでいても）を
 * 正しく反映できるようにする。
 *
 * `wp_enqueue_scripts` 自体は `wp_head` の優先度1で発火し、コアはスタイルを
 * `wp_head` の優先度8で `wp_print_styles()` により出力する。`wp_head` の優先度7で
 * フックすることで、`wp_enqueue_scripts` アクション全体（その中で行われる
 * dequeue 処理を含む）が完了した後、かつ出力される前に実行できる。
 */
add_action( 'wp_head', 'xt9_fix_global_styles_print_order', 7 );
