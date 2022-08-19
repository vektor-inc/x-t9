;
((window, document) => {
    /*----------------------------------------------------------*/
    /*  scroll
    /*----------------------------------------------------------*/
    // Scroll function
    let bodyClass = () => {
        if (window.pageYOffset > 0) {
            document.body.classList.add('scrolled')
        } else {
            document.body.classList.remove('scrolled')
        }
    }
    window.addEventListener('scroll', bodyClass, false)
    window.addEventListener('DOMContentLoaded', bodyClass, false)

    // ヘッダー要素がない場合の判別
    const siteHeader = document.getElementsByTagName('header');

    if (xt9Opt.header_scrool && siteHeader) {

        // ヘッダーの元の高さを取得
        // Get Header Height
        const siteHeaderContainerHeight = siteHeader[0].offsetHeight;

        let body_class_timer = false;
        let body_class_lock = false;

        let header_scrool_func = () => {

            let siteHeader = document.getElementsByTagName('header');
            let siteHeaderNext = siteHeader.nextElementSibling;

            if (!body_class_lock && window.pageYOffset > siteHeaderContainerHeight) {
                // ヘッダースクロール識別用のclass追加
                document.body.classList.add('header-fixed-active')
                if (xt9Opt.add_header_offset_margin) {
                    // コンテナ部分をfixedにするので、ガクンとならないように、ヘッダーの次の要素にヘッダーの高さ分余白を追加する 
                    siteHeaderNext.style.marginTop = siteHeaderContainerHeight + "px";
                }
            } else {
                document.body.classList.remove('header-fixed-active')
                if (xt9Opt.add_header_offset_margin) {
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
            body_class_timer = setTimeout(() => {
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
                    if (!href || href.indexOf('#') != 0) return;
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

    /*----------------------------------------------------------*/
    /*  Footer Fix Navigation
    /*----------------------------------------------------------*/
    // スクロールで表示
    let showScroll = document.querySelectorAll('.js-show-scroll');
    let id = null;
    let show_scroll_func = () => {
        for (let i = 0; i < showScroll.length; i++) {
            showScroll[i].style.bottom = '0';
        };
        // スクロール終了2秒後に非表示
        clearTimeout(id);
        id = setTimeout(function () {
            for (let i = 0; i < showScroll.length; i++) {
                showScroll[i].style.bottom = '-100%';
            };
            id = null;
        }, 2000);
    };

    window.addEventListener('scroll', show_scroll_func, false);


    // 上スクロールで表示
    let showScrollUp = document.querySelectorAll('.js-show-scrollUp');
    // function
    let show_scroll_up_func = () => {
        let start_position = 0;
        let window_position = window.pageYOffset;
        for (let i = 0; i < showScrollUp.length; i++) {
            if (window_position <= start_position) {
                showScrollUp[i].style.bottom = '0';
            } else {
                showScrollUp[i].style.bottom = '-100%';
            }
            // 現在位置の更新
            start_position = window_position;
        }
    };

    window.addEventListener('scroll', show_scroll_up_func, false);

})(window, document);
