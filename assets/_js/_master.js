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
// 画面上にコンテンツと重なって表示され得るヘッダー（常時固定 / sticky / スクロールで出現）の
// 実際の高さを、CSS カスタムプロパティ --x-t9-fixed-header-height へ反映する。
// これにより、目次ブロックなどページ内リンクのジャンプ先や :focus 時のスクロール位置を、
// scroll-margin-block-start で実際のヘッダー高さ分だけ補正できる。
//
// どのヘッダーパターンのときに補正を効かせるか、スクロールで出現するヘッダーが
// 画面内にあるかどうかの判定は、すべて CSS 側（_common_margin-vertical.scss の :has()）が担う。
// この JS は高さの測定だけを行う。
//
// Reflects the real height of a header that can overlap page content (always-fixed, sticky, or
// scroll-triggered) into the --x-t9-fixed-header-height CSS custom property, so that
// scroll-margin-block-start can offset in-page link targets and :focus positions by the actual
// header height.
//
// Deciding which header patterns get the offset, and whether a scroll-triggered header is
// currently on screen, is handled entirely in CSS (the :has() rules in
// _common_margin-vertical.scss). This script only measures the height.
( () => {
    // ResizeObserver 未対応ブラウザでは何もしない。
    // CSS 側は var() のフォールバック値で従来どおり動作する。
    // Do nothing in browsers without ResizeObserver support; the CSS var() fallback keeps the
    // previous behavior.
    if ( typeof ResizeObserver === 'undefined' ) {
        return
    }

    // sticky ヘッダーは header そのものではなく内側の要素にクラスが付くため、
    // 子孫セレクタで拾ってから closest() で header まで遡る（:has() を使わないので
    // 未対応ブラウザでも例外にならない）。
    // For the sticky pattern the class is on an element inside the header rather than on the
    // header itself, so match a descendant and walk back up with closest(). This avoids :has()
    // in querySelector, which throws in browsers without support for it.
    const stickyInner = document.querySelector( 'header [class*="is-position-sticky"]' )

    const header =
        document.querySelector( 'header.is-position-fixed' ) ||
        ( stickyInner && stickyInner.closest( 'header' ) ) ||
        document.querySelector( '[class*="scrolled-header-fixed"]' )

    if ( ! header ) {
        return
    }

    // observe() は監視開始時にも一度発火するため、初期値の設定も兼ねる。
    // レスポンシブでヘッダー高さが変わる場合もこれで追従する。
    // observe() fires once when observation starts, so this also sets the initial value.
    // It also keeps up with responsive changes in header height.
    new ResizeObserver( () => {
        document.documentElement.style.setProperty(
            '--x-t9-fixed-header-height',
            `${ header.offsetHeight }px`
        )
    } ).observe( header )
} )();
