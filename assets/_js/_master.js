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
// header.is-position-fixed（常時固定ヘッダーパターン）の高さをリアルタイムに監視し、
// --x-t9-fixed-header-height という CSS カスタムプロパティに反映する。
// これにより、目次ブロックなどページ内リンクのジャンプ先や :focus 時に scroll-margin-block-start で
// 実際のヘッダー高さ分だけ正確にスクロール位置を補正できるようになる
// （PC/スマホでヘッダー高さが異なるレスポンシブ構成にも自動で追従する）。
// 対象範囲: header.is-position-fixed（常時固定ヘッダー）のみ。
// is-style-scrolled-header-fixed（スクロールで出現する高さ可変ヘッダー）は対象外。
//
// Watches the height of header.is-position-fixed (the always-fixed header pattern) in real
// time and reflects it into the --x-t9-fixed-header-height CSS custom property, so
// scroll-margin-block-start (used e.g. by in-page links from the Table of Contents block, and
// by :focus for keyboard navigation) can offset the scroll position by the exact header height
// (automatically tracking responsive layouts where the header height differs between PC and
// mobile).
// Scope: only header.is-position-fixed (the always-fixed header pattern) is supported;
// is-style-scrolled-header-fixed (a variable-height header that appears on scroll) is out of
// scope.
(() => {
    'use strict';

    // ResizeObserver 未対応ブラウザでは何もしない（CSS 側の var() フォールバックで 0px のまま動作する）
    // Do nothing in browsers without ResizeObserver support (the CSS var() fallback keeps it at 0px)
    if (typeof ResizeObserver === 'undefined') {
        return;
    }

    const fixedHeader = document.querySelector('header.is-position-fixed');

    // 固定ヘッダーが存在しないページでは何もしない（変数未設定のままフォールバック値の0pxが使われる）
    // Do nothing on pages without a fixed header (the variable stays unset and falls back to 0px)
    if (!fixedHeader) {
        return;
    }

    const resizeObserver = new ResizeObserver((entries) => {
        entries.forEach((entry) => {
            // offsetHeight は border / padding を含む実際の表示高さのため使用する
            // Use offsetHeight since it includes border/padding and reflects the actual rendered height
            document.documentElement.style.setProperty(
                '--x-t9-fixed-header-height',
                entry.target.offsetHeight + 'px'
            );
        });
    });

    resizeObserver.observe(fixedHeader);
})();
