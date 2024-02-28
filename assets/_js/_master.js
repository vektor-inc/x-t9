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
    const siteHeader = document.getElementsByTagName('header');

    if( xt9Opt.header_scrool && siteHeader ){

        // ヘッダーの元の高さを取得
		// Get Header Height
        const siteHeaderContainerHeight = siteHeader[0].offsetHeight;

        let body_class_timer = false;
        let body_class_lock = false;

        let header_scrool_func = ()=>{

            let siteHeader = document.getElementsByTagName('header');
            let siteHeaderNext = siteHeader.nextElementSibling;

            if( ! body_class_lock && window.pageYOffset > siteHeaderContainerHeight ){
                // ヘッダースクロール識別用のclass追加
                document.body.classList.add('header-fixed-active')
                if(xt9Opt.add_header_offset_margin){
                    // コンテナ部分をfixedにするので、ガクンとならないように、ヘッダーの次の要素にヘッダーの高さ分余白を追加する 
                    siteHeaderNext.style.marginTop = siteHeaderContainerHeight + "px";
                }
            } else {
                document.body.classList.remove('header-fixed-active')
                if(xt9Opt.add_header_offset_margin){
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
/*----------------------------------------------------------*/
//コアが修正されたら削除する。Navigation Link ブロックとは異なり、Navigation Submenu ブロックはメニュー項目の説明 HTML をレンダリングしないため追加。
//Navigation Submenu block does not render menu item description #52505

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