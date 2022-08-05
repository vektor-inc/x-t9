<?php
/**
 * Footer BG Bright 3col
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Bright 3col', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '
	<!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"backgroundColor":"bg-light-gray","textColor":"text-normal"} -->
<div class="wp-block-group has-text-normal-color has-bg-light-gray-background-color has-text-color has-background"><!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"inherit":true}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:site-logo {"width":200} /-->

<!-- wp:paragraph {"textColor":"text-normal"} -->
<p class="has-text-normal-color has-text-color">ZIP 000-0000<br>Address here prefecture <br>City address 0-0-0<br>TEL : 000-000-0000</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"text-secondary","iconColorValue":"rgba(0,0,0,0.5)","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"},"style":{"spacing":{"blockGap":"1rem","margin":{"top":"5px","bottom":"5px"}}}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-top:5px;margin-bottom:5px"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"textColor":"text-normal","className":"is-style-vk-heading-plain"} -->
<h4 class="is-style-vk-heading-plain has-text-normal-color has-text-color">Contents</h4>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"backgroundColor":"border-normal","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->

<!-- wp:navigation {"showSubmenuIcon":false,"overlayMenu":"never","className":"is-style-nav\u002d\u002dvertical-with-hr","layout":{"type":"flex","orientation":"vertical"},"fontSize":"x-small"} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":"is-style-vk-heading-plain"} -->
<h4 class="is-style-vk-heading-plain">Information</h4>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"backgroundColor":"border-normal","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:query {"queryId":1,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"width":"60px","height":"60px"} /-->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-date {"textColor":"text-secondary","fontSize":"x-small"} /-->

<!-- wp:post-title {"level":6,"isLink":true,"className":"text-light ","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"backgroundColor":"border-normal","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。","textColor":"text-normal"} -->
<p class="has-text-normal-color has-text-color">投稿はありません</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"className":"is-style-spacer-lg"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer -->

<!-- wp:group {"className":"mt-0","layout":{"inherit":true}} -->
<div class="wp-block-group mt-0"><!-- wp:separator {"align":"full","backgroundColor":"border-normal","className":"is-style-wide"} -->
<hr class="wp-block-separator alignfull has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"textColor":"text-secondary","layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group has-text-secondary-color has-text-color" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:navigation {"className":"is-style-nav\u002d\u002dtext-inline","fontSize":"small"} /-->

<!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"x-small"} -->
<p class="has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
