;
((window, document) => {
    /*----------------------------------------------------------*/
    /*  scroll
    /*----------------------------------------------------------*/
    // Scroll function
    let bodyClass = () => {
        if(window.pageYOffset > 0){
            document.body.classList.add('scrolled')
        }else{
            document.body.classList.remove('scrolled')
        }
    }
    window.addEventListener('scroll', bodyClass, false)
    window.addEventListener('DOMContentLoaded', bodyClass, false)

    // ヘッダー要素がない場合の判別
    // getElementsByTagName は要素ゼロでも空の HTMLCollection（truthy）を返すため、
    // 要素数で判定する必要がある。
    const siteHeader = document.getElementsByTagName('header');

    if( xt9Opt.header_scrool && siteHeader.length > 0 ){

        // ヘッダーの元の高さを取得
		// Get Header Height
        const siteHeaderContainerHeight = siteHeader[0].offsetHeight;

        let body_class_timer = false;
        let body_class_lock = false;

        let header_scrool_func = ()=>{

            // HTMLCollection ではなく実要素に対して nextElementSibling を呼ぶ必要がある。
            let siteHeaderNext = siteHeader[0].nextElementSibling;

            if( ! body_class_lock && window.pageYOffset > siteHeaderContainerHeight ){
                // ヘッダースクロール識別用のclass追加
                document.body.classList.add('header-fixed-active')
                if(xt9Opt.add_header_offset_margin && siteHeaderNext){
                    // コンテナ部分をfixedにするので、ガクンとならないように、ヘッダーの次の要素にヘッダーの高さ分余白を追加する
                    siteHeaderNext.style.marginTop = siteHeaderContainerHeight + "px";
                }
            } else {
                document.body.classList.remove('header-fixed-active')
                if(xt9Opt.add_header_offset_margin && siteHeaderNext){
                    siteHeaderNext.style.marginTop = null;
                }
            }
        }

        let remove_header = (e) => {
            document.body.classList.remove('header-fixed-active')
            window.removeEventListener('scroll', header_scrool_func)
            if (body_class_timer !== false) {
                clearTimeout(body_class_timer)
            }
            body_class_lock = true
            body_class_timer = setTimeout(()=>{
                window.addEventListener('scroll', header_scrool_func, true)
                body_class_lock = false
            }, 2000);
        }

		// Reset scroll class
        window.addEventListener('DOMContentLoaded', () => {
            Array.prototype.forEach.call(
                document.getElementsByTagName('a'),
                (elem) => {
                    let href = elem.getAttribute('href')
					// リンクアドレスの指定が無いか # で始まる場合
                    if(!href || href.indexOf('#') != 0) return;
					// role="button" を含めると ボタンブロックのページ内リンクした時にリンク先の頭に固定ナビが上に被ってしまうので tab だけにしている
                    // if (['tab', 'button'].indexOf(elem.getAttribute('role')) > 0) return;
                    if (['tab'].indexOf(elem.getAttribute('role')) > 0) return;
                    if (elem.getAttribute('data-toggle')) return;
                    if (elem.getAttribute('carousel-control')) return;
					// スクロール識別クラスを削除する
                    elem.addEventListener('click', remove_header)
                }
            )
        });

        window.addEventListener('scroll', header_scrool_func, true)
        window.addEventListener('DOMContentLoaded', header_scrool_func, false)
    }

})(window, document);


/*----------------------------------------------------------*/
/*  navigation submenu description
/*  6.8がリリースされたら削除する
/*  下階層がある場合は正常に動作しない（追加されない）が 6.8 で対応されてるのでそのまま
/*----------------------------------------------------------*/
// Navigation Link ブロックとは異なり、Navigation Submenu ブロックはメニュー項目の説明 HTML をレンダリングしないため追加。
// Navigation Submenu block does not render menu item description #52505

document.addEventListener('DOMContentLoaded', function() {
    // サブメニューを持つナビゲーションアイテムを対象にループします。
    document.querySelectorAll('nav .wp-block-navigation-item.has-child').forEach(function(item) {
        // サブメニューを持つアイテム内のすべてのリンクを対象にループします。
        item.querySelectorAll('a').forEach(function(link) {
            // data-description属性を持つリンクを対象にします。
            if (link.hasAttribute('data-description')) {
                const description = link.getAttribute('data-description');
                // 説明テキストを含む新しいspan要素を作成します。
                const descriptionSpan = document.createElement('span');
                descriptionSpan.className = 'wp-block-navigation-item__description';
                descriptionSpan.textContent = description;
                // この新しいspan要素をリンクの直後に挿入します。
                link.parentNode.insertBefore(descriptionSpan, link.nextSibling);
            }
        });
    });
});


/*----------------------------------------------------------*/
/*  fixed header height => CSS custom property
/*----------------------------------------------------------*/
// ヘッダーが画面上に重なって表示される複数のパターン（常時固定 / sticky / スクロールで出現）の
// 高さをリアルタイムに監視し、--x-t9-fixed-header-height という CSS カスタムプロパティに反映する。
// これにより、目次ブロックなどページ内リンクのジャンプ先や :focus 時に scroll-margin-block-start で
// 実際のヘッダー高さ分だけ正確にスクロール位置を補正できるようになる
// （PC/スマホでヘッダー高さが異なるレスポンシブ構成にも自動で追従する）。
// 対象範囲:
//   1. header.is-position-fixed        … 常時固定ヘッダー
//   2. header:has([class*="is-position-sticky"]) … sticky ヘッダー（張り付いていない間も通常フロー内で
//      何にも重ならないため、常に高さを反映してよい）
//   3. *[class*="scrolled-header-fixed"] … スクロールで出現するヘッダー（body に
//      .header-fixed-active が付与されている間だけ画面内に現れるため、そのクラスがある時だけ高さを
//      反映し、外れたら即座に 0 へ戻す。戻さないと、ヘッダーが画面外へ退避した後も
//      scroll-margin-block-start の余白だけが残る「ゴーストスペース」が発生するため）
// 複数パターンが同時に該当するサイトでも極端に壊れないよう、各パターンの高さのうち最大値を採用する。
//
// Watches the height of the header patterns that can visually overlap page content (always-fixed /
// sticky / scroll-triggered) in real time and reflects it into the --x-t9-fixed-header-height CSS
// custom property, so scroll-margin-block-start (used e.g. by in-page links from the Table of
// Contents block, and by :focus for keyboard navigation) can offset the scroll position by the
// exact header height (automatically tracking responsive layouts where the header height differs
// between PC and mobile).
// Scope:
//   1. header.is-position-fixed                    … the always-fixed header
//   2. header:has([class*="is-position-sticky"])  … the sticky header (it never overlaps content
//      while unstuck, since it stays in normal flow, so its height can always be reflected)
//   3. *[class*="scrolled-header-fixed"]           … the header that appears on scroll only while
//      body has the .header-fixed-active class; its height is reflected only while that class is
//      present and reset to 0 immediately once it's removed, otherwise the scroll-margin-block-start
//      offset would leave a "ghost gap" behind after the header slides off-screen again
// If a site somehow matches more than one pattern at once, the highest of the matched heights is
// used so the result stays reasonable without extra complexity.
(() => {
    'use strict';

    // ResizeObserver 未対応ブラウザでは何もしない（CSS 側の var() フォールバックで 0px のまま動作する）
    // Do nothing in browsers without ResizeObserver support (the CSS var() fallback keeps it at 0px)
    if (typeof ResizeObserver === 'undefined') {
        return;
    }

    // パターンごとの高さを保持し、複数該当時は最大値を採用する
    // Keep each pattern's height separately; when multiple patterns match, the maximum is used
    const headerHeights = {
        fixed: 0,
        sticky: 0,
        scrolled: 0,
    };

    // 保持している最大値を CSS カスタムプロパティへ反映する
    // Reflect the current maximum height into the CSS custom property
    const applyMaxHeaderHeight = () => {
        const maxHeight = Math.max(headerHeights.fixed, headerHeights.sticky, headerHeights.scrolled);
        document.documentElement.style.setProperty(
            '--x-t9-fixed-header-height',
            maxHeight + 'px'
        );
    };

    /* header.is-position-fixed（常時固定ヘッダー）
       ---------------------------------------------------------- */
    const fixedHeader = document.querySelector('header.is-position-fixed');

    if (fixedHeader) {
        const fixedHeaderObserver = new ResizeObserver((entries) => {
            entries.forEach((entry) => {
                // offsetHeight は border / padding を含む実際の表示高さのため使用する
                // Use offsetHeight since it includes border/padding and reflects the actual rendered height
                headerHeights.fixed = entry.target.offsetHeight;
                applyMaxHeaderHeight();
            });
        });

        fixedHeaderObserver.observe(fixedHeader);
    }

    /* header:has([class*="is-position-sticky"])（sticky ヘッダー）
       ---------------------------------------------------------- */
    // :has() 未対応ブラウザでは querySelector が例外を投げるため try/catch で無視する
    // （CSS 側の :has() も効かず sticky にならないため、影響はない）
    // In browsers without :has() support querySelector throws, so ignore it via try/catch
    // (the CSS :has() rule won't apply either, so the header won't be sticky there — no impact)
    let stickyHeader = null;

    try {
        stickyHeader = document.querySelector('header:has([class*="is-position-sticky"])');
    } catch (e) {
        stickyHeader = null;
    }

    if (stickyHeader) {
        const stickyHeaderObserver = new ResizeObserver((entries) => {
            entries.forEach((entry) => {
                headerHeights.sticky = entry.target.offsetHeight;
                applyMaxHeaderHeight();
            });
        });

        stickyHeaderObserver.observe(stickyHeader);
    }

    /* *[class*="scrolled-header-fixed"]（スクロールで出現するヘッダー）
       ---------------------------------------------------------- */
    const scrolledHeader = document.querySelector('[class*="scrolled-header-fixed"]');

    if (scrolledHeader) {
        // ResizeObserver のコールバックは body に .header-fixed-active が無い間も発火し得るため、
        // 実測した高さを一旦保持しておき、反映するかどうかは MutationObserver 側の判定に委ねる
        // The ResizeObserver callback can fire even while body lacks .header-fixed-active, so the
        // measured height is cached here and whether to apply it is left to the MutationObserver below
        let scrolledHeaderMeasuredHeight = 0;

        const scrolledHeaderObserver = new ResizeObserver((entries) => {
            entries.forEach((entry) => {
                scrolledHeaderMeasuredHeight = entry.target.offsetHeight;

                if (document.body.classList.contains('header-fixed-active')) {
                    headerHeights.scrolled = scrolledHeaderMeasuredHeight;
                    applyMaxHeaderHeight();
                }
            });
        });

        scrolledHeaderObserver.observe(scrolledHeader);

        // 既存の header_scrool_func を直接改変せず、body の class 属性の変化だけを独立して監視し、
        // header-fixed-active の有無に応じて反映 / クリア（0へリセット）する
        // Watch body's class attribute independently instead of modifying the existing
        // header_scrool_func, and reflect / clear (reset to 0) the height depending on whether
        // header-fixed-active is present
        const bodyClassObserver = new MutationObserver(() => {
            headerHeights.scrolled = document.body.classList.contains('header-fixed-active')
                ? scrolledHeaderMeasuredHeight
                : 0;
            applyMaxHeaderHeight();
        });

        bodyClassObserver.observe(document.body, {
            attributes: true,
            attributeFilter: ['class'],
        });
    }
})();
