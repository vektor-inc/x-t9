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
 * Scope: the three header patterns that can overlap page content are
 * supported (always-fixed, sticky, and the header that appears on scroll).
 * Headers whose height changes dynamically while scrolling (e.g. shrink on
 * scroll) are out of scope, because the height is measured once at the
 * moment of the screen transition.
 * 対象範囲: 画面上でコンテンツに重なり得る 3 つのヘッダーパターン
 * （常時固定 / sticky / スクロールで出現）に対応する。スクロールに応じて
 * 高さが動的に変化するヘッダー（shrink on scroll 等）は、画面遷移の時点で
 * 高さを一度だけ実測する仕組みのため対象外。
 */
( function () {
	'use strict';

	/**
	 * Return the height of the header that currently overlaps page content.
	 * 現在ページコンテンツに重なっているヘッダーの高さを返す。
	 *
	 * Which patterns count as overlapping, and the condition for the
	 * scroll-triggered one, are kept in sync with
	 * assets/_scss/_common_margin-vertical.scss, which applies the same offset
	 * to in-page links through scroll-margin-block-start. Keeping the two in
	 * step means a page cannot end up correcting in-page links but not form
	 * transitions.
	 * どのパターンを「重なる」とみなすか、およびスクロールで出現するヘッダーの
	 * 適用条件は、ページ内リンクに対して scroll-margin-block-start で同じ補正を
	 * かけている assets/_scss/_common_margin-vertical.scss と揃えてある。両者を
	 * 揃えることで、ページ内リンクは補正されるのにフォームの画面遷移は補正
	 * されない、という食い違いが起きないようにしている。
	 *
	 * Measured on every call rather than cached, so responsive layouts where
	 * the header height differs between PC and mobile stay correct.
	 * PC とスマホでヘッダー高さが異なるレスポンシブ構成にも対応できるよう、
	 * キャッシュせず呼び出しのたびに実測する。
	 *
	 * @return {number} The header height in px, or 0 when no header overlaps.
	 *                  ヘッダーの高さ（px）。重なるヘッダーが無い場合は 0。
	 */
	function getOverlappingHeaderHeight() {
		// 1. The always-fixed header. It overlaps for the whole page.
		//    常時固定ヘッダー。ページ全体で重なる。
		var fixedHeader = document.querySelector( 'header.is-position-fixed' );
		if ( fixedHeader ) {
			return fixedHeader.offsetHeight;
		}

		// 2. The sticky header. The class is on an element inside the header
		//    rather than on the header itself, so walk back up to the header.
		//    It sits in normal flow until it sticks, but by the time the form
		//    has scrolled into place it is stuck, so it always applies.
		//    sticky ヘッダー。クラスは header そのものではなく内側の要素に付くため
		//    header まで遡る。張り付くまでは通常フロー内にあるが、フォーム位置まで
		//    スクロールした時点では張り付いているため、常に対象とする。
		var stickyInner = document.querySelector(
			'header [class*="is-position-sticky"]'
		);
		if ( stickyInner ) {
			var stickyHeader = stickyInner.closest( 'header' );
			if ( stickyHeader ) {
				return stickyHeader.offsetHeight;
			}
		}

		// 3. The header that appears on scroll. It only overlaps while it is
		//    on screen, which the theme marks by adding `header-fixed-active`
		//    to the body. Without this check the form would be pushed down by
		//    the height of a header that is not visible.
		//    スクロールで出現するヘッダー。画面内にある間だけ重なり、その状態は
		//    テーマが body に `header-fixed-active` を付けて示している。この判定が
		//    無いと、表示されていないヘッダーの高さ分だけフォームが下がってしまう。
		if ( document.body.classList.contains( 'header-fixed-active' ) ) {
			var scrolledHeader = document.querySelector(
				'[class*="scrolled-header-fixed"]'
			);
			if ( scrolledHeader ) {
				return scrolledHeader.offsetHeight;
			}
		}

		return 0;
	}

	/**
	 * Re-scroll to the SMF focus point, offset by the overlapping header height.
	 * SMF のフォーカスポイントへ、重なっているヘッダーの高さ分を差し引いて再スクロールする。
	 *
	 * @param {CustomEvent} event The `smf.confirm` / `smf.complete` / `smf.back` event
	 *                            fired on the form element.
	 *                            フォーム要素で発火する `smf.confirm` / `smf.complete` /
	 *                            `smf.back` イベント。
	 */
	function adjustScrollForOverlappingHeader( event ) {
		var form = event.target;
		var focusPoint = form.querySelector( '.smf-focus-point' );

		// No focus point on this page: nothing to adjust.
		// フォーカスポイントが無いページでは補正不要。
		if ( ! focusPoint ) {
			return;
		}

		var headerHeight = getOverlappingHeaderHeight();

		// No header overlapping the content: SMF's own scroll position is
		// already correct.
		// コンテンツに重なるヘッダーが無い場合は、SMF 自身のスクロール位置で正しい。
		if ( ! headerHeight ) {
			return;
		}

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
		document.addEventListener( eventName, adjustScrollForOverlappingHeader, false );
	} );
} )();
