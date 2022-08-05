<?php
/**
 * Footer BG Dark 3col
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Dark 3col', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '
	<!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide"/>
<!-- /wp:separator -->
	<!-- wp:group {"backgroundColor":"bg-dark-gray","textColor":"text-normal-darkbg"} -->
	<div class="wp-block-group has-text-normal-darkbg-color has-bg-dark-gray-background-color has-text-color has-background"><!-- wp:group {"style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem"}}},"layout":{"inherit":true}} -->
	<div class="wp-block-group" style="padding-top:1.5rem;padding-bottom:1.5rem"><!-- wp:columns -->
	<div class="wp-block-columns"><!-- wp:column -->
	<div class="wp-block-column"><!-- wp:group -->
	<div class="wp-block-group"><!-- wp:image {"width":180,"sizeSlug":"full","linkDestination":"media"} -->
	<figure class="wp-block-image size-full is-resized"><img src="' . get_template_directory_uri() . '/inc/patterns/images/logo-sample-darkbg.png" alt="" width="180"/></figure>
	<!-- /wp:image -->

	<!-- wp:paragraph -->
	<p>ZIP 000-0000<br>Address here prefecture <br>City address 0-0-0<br>TEL : 000-000-0000</p>
	<!-- /wp:paragraph -->
	
	<!-- wp:social-links {"iconColor":"text-normal-darkbg","iconColorValue":"rgba( 255,255,255,0.8 )","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"},"style":{"spacing":{"blockGap":"1rem","margin":{"top":"5px","bottom":"5px"}}}} -->
	<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-top:5px;margin-bottom:5px"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->
	
	<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
	<!-- /wp:social-links --></div>
	<!-- /wp:group --></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:group -->
	<div class="wp-block-group"><!-- wp:heading {"level":4,"textColor":"text-normal-darkbg","className":"is-style-vk-heading-plain"} -->
	<h4 class="is-style-vk-heading-plain has-text-normal-darkbg-color has-text-color">Contents</h4>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:separator {"backgroundColor":"border-normal-darkbg","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-border-normal-darkbg-color has-alpha-channel-opacity has-border-normal-darkbg-background-color has-background is-style-wide"/>
	<!-- /wp:separator --></div>
	<!-- /wp:group -->
	
	<!-- wp:navigation {"showSubmenuIcon":false,"overlayMenu":"never","className":"is-style-nav\u002d\u002dvertical-with-hr","layout":{"type":"flex","orientation":"vertical"},"fontSize":"x-small"} /--></div>
	<!-- /wp:column -->
	
	<!-- wp:column -->
	<div class="wp-block-column"><!-- wp:group -->
	<div class="wp-block-group"><!-- wp:heading {"level":4,"textColor":"text-normal-darkbg","className":"is-style-vk-heading-plain"} -->
	<h4 class="is-style-vk-heading-plain has-text-normal-darkbg-color has-text-color">Information</h4>
	<!-- /wp:heading -->
	
	<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
	<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:separator {"backgroundColor":"border-normal-darkbg","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-border-normal-darkbg-color has-alpha-channel-opacity has-border-normal-darkbg-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:query {"queryId":1,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query">

<!-- wp:post-template -->
<!-- wp:pattern {"slug":"x-t9/post-template-subcontent"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。","textColor":"text-normal-darkbg"} -->
<p class="has-text-normal-darkbg-color has-text-color">投稿はありません</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->
	
	</div>
	<!-- /wp:group --></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns --></div>
	<!-- /wp:group -->
	
	<!-- wp:group {"className":"mt-0","layout":{"inherit":true}} -->
	<div class="wp-block-group mt-0"><!-- wp:separator {"opacity":"css","backgroundColor":"border-normal-darkbg","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-border-normal-darkbg-color has-css-opacity has-border-normal-darkbg-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:navigation {"textColor":"text-secondary-darkbg","overlayMenu":"never","className":"nav\u002d\u002dtext-inline nav\u002d\u002ddarkbg","layout":{"type":"flex","justifyContent":"center"},"fontSize":"x-small"} /-->
	
	<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"text-secondary-darkbg","fontSize":"x-small"} -->
	<p class="has-text-align-center has-text-secondary-darkbg-color has-text-color has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);
