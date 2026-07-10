/**
 * Snow Monkey Forms fixed header offset adjustment.
 * 固定ヘッダー使用時の Snow Monkey Forms スクロール位置補正。
 *
 * Snow Monkey Forms (SMF) scrolls the screen to `.smf-focus-point` with
 * `window.scrollTo()` when the form transitions between screens (confirm,
 * complete, back), but it does not account for the height of a fixed
 * header. On sites using the X-T9 fixed header pattern
 * (`header.is-position-fixed`), this causes the top of the form to be
 * hidden behind the header after the screen transition.
 * Snow Monkey Forms（以下 SMF）はフォームの画面遷移時（確認画面・完了画面・
 * 戻る）に `window.scrollTo()` で `.smf-focus-point` までスクロールするが、
 * 固定ヘッダーの高さを考慮していない。そのため X-T9 の固定ヘッダーパターン
 * （`header.is-position-fixed`）を使用しているサイトでは、画面遷移後に
 * フォームの先頭がヘッダーの下に隠れてしまう。
 *
 * This script listens for the SMF custom events fired only when SMF itself
 * scrolls to the focus point (`smf.confirm` / `smf.complete` / `smf.back`)
 * and re-scrolls to the same focus point, subtracting the fixed header
 * height (and, for logged-in users, the admin bar height) from the target
 * position.
 * このスクリプトでは、SMF が実際にフォーカスポイントへスクロールする
 * タイミングでのみ発火するカスタムイベント（`smf.confirm` / `smf.complete` /
 * `smf.back`）を監視し、同じフォーカスポイントへ固定ヘッダーの高さ
 * （ログインユーザーの場合は管理バーの高さも）分だけ差し引いた位置へ
 * 再スクロールする。
 *
 * Note: `smf.submit` also fires for the `invalid` screen (validation
 * errors on the input screen), but in that case SMF moves focus to the
 * first invalid control instead of scrolling to the focus point. Using
 * `smf.submit` here would incorrectly override that focus behavior, so
 * only the three events above (which always accompany an actual scroll to
 * the focus point) are used.
 * 補足: `smf.submit` は入力エラー時（`invalid` 画面）でも発火するが、その
 * ケースでは SMF はフォーカスポイントへのスクロールではなく、最初の
 * エラー項目へフォーカスを移動する。`smf.submit` を使うとこのフォーカス
 * 挙動を誤って上書きしてしまうため、実際にフォーカスポイントへ
 * スクロールする上記 3 イベントのみを対象にしている。
 *
 * Scope: only the fixed header pattern (`is-position-fixed`) is supported.
 * The `scrolled-header-fixed` pattern (header that appears on scroll) and
 * headers whose height changes dynamically (e.g. shrink on scroll) are out
 * of scope.
 * 対象範囲: `is-position-fixed` の固定ヘッダーパターンのみ対応する。
 * スクロールで出現する `scrolled-header-fixed` パターンや、スクロールに
 * 応じて高さが動的に変化するヘッダー（shrink on scroll 等）は対象外。
 */
( function () {
	'use strict';

	/**
	 * Re-scroll to the SMF focus point, offset by the fixed header height.
	 * SMF のフォーカスポイントへ、固定ヘッダーの高さ分を差し引いて再スクロールする。
	 *
	 * @param {CustomEvent} event The `smf.confirm` / `smf.complete` / `smf.back` event
	 *                            fired on the form element.
	 *                            フォーム要素で発火する `smf.confirm` / `smf.complete` /
	 *                            `smf.back` イベント。
	 */
	function adjustScrollForFixedHeader( event ) {
		var form = event.target;
		var focusPoint = form.querySelector( '.smf-focus-point' );
		var fixedHeader = document.querySelector( 'header.is-position-fixed' );

		// No focus point or no fixed header on this page: nothing to adjust.
		// フォーカスポイントが無い、または固定ヘッダーが無いページでは補正不要。
		if ( ! focusPoint || ! fixedHeader ) {
			return;
		}

		// Measure the header height every time instead of caching it, so
		// this also works correctly when the header height differs between
		// PC and mobile (responsive layouts).
		// PC とスマホでヘッダー高さが異なるレスポンシブ構成にも対応できるよう、
		// キャッシュせずイベント発火のたびに実測する。
		var headerHeight = fixedHeader.offsetHeight;

		// WordPress core exposes the admin bar height (32px, or 46px on
		// narrow viewports) as a CSS custom property for logged-in users.
		// It is empty (falls back to 0) when the admin bar is not shown.
		// WordPress コアはログインユーザー向けに管理バーの高さ（32px、狭い
		// ビューポートでは 46px）を CSS カスタムプロパティとして公開している。
		// 管理バーが表示されない場合は空文字になり、0 にフォールバックする。
		var adminBarHeight =
			parseInt(
				getComputedStyle( document.documentElement ).getPropertyValue(
					'--wp-admin--admin-bar--height'
				) || '0',
				10
			) || 0;

		var targetY =
			window.pageYOffset +
			focusPoint.getBoundingClientRect().top -
			headerHeight -
			adminBarHeight;

		window.scrollTo( 0, targetY );
	}

	[ 'smf.confirm', 'smf.complete', 'smf.back' ].forEach( function ( eventName ) {
		document.addEventListener( eventName, adjustScrollForFixedHeader, false );
	} );
} )();
