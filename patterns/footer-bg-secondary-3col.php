<?php
/**
 * Title: Footer BG Secondary 3columns
 * Slug: x-t9/footer-bg-secondary-3col
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.0
 */

?>
<!-- wp:group {"metadata":{"categories":["footer"],"patternName":"x-t9/footer-bg-secondary-3col","name":"Footer BG Secondary 3columns"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"border":{"top":{"color":"var:preset|color|primary","width":"2px"}}},"backgroundColor":"bg-secondary","textColor":"text-normal"} -->
<div class="wp-block-group alignfull has-text-normal-color has-bg-secondary-background-color has-text-color has-background" style="border-top-color:var(--wp--preset--color--primary);border-top-width:2px;margin-top:0;margin-bottom:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"width":"180px","sizeSlug":"full","linkDestination":"media"} -->
<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/inc/patterns/images/logo-sample.png" alt="" style="width:180px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
<p style="margin-top:var(--wp--preset--spacing--40)">ZIP 000-0000<br>Address here prefecture <br>City address 0-0-0<br>TEL : 000-000-0000</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"text-secondary","iconColorValue":"rgba(0,0,0,0.5)","openInNewTab":true,"size":"has-normal-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"},"margin":{"top":"var:preset|spacing|40","bottom":"0","right":"0","left":"0"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only" style="margin-top:var(--wp--preset--spacing--40);margin-right:0;margin-bottom:0;margin-left:0"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"x"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|border-normal","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border-normal);border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"color":{"background":"#00000000"}}} -->
<h4 class="wp-block-heading has-background" style="background-color:#00000000;margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( 'Service', 'x-t9' ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:navigation {"textColor":"text-normal","showSubmenuIcon":false,"overlayMenu":"never","className":"is-style-nav\u002d\u002dvertical-with-hr","fontSize":"x-small","layout":{"type":"flex","orientation":"vertical"}} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|border-normal","width":"1px"}},"spacing":{"padding":{"bottom":"var:preset|spacing|30"},"margin":{"bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--border-normal);border-bottom-width:1px;margin-bottom:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"level":4,"className":"is-style-vk-heading-default","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"backgroundColor":"transparent"} -->
<h4 class="wp-block-heading is-style-vk-heading-default has-transparent-background-color has-background" style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php echo esc_html__( 'Information', 'x-t9' ); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:query {"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"width":"60px","height":"60px"} /-->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"textColor":"text-secondary","fontSize":"x-small"} /-->

<!-- wp:post-title {"level":6,"isLink":true,"className":"text-light ","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。","textColor":"text-normal-darkbg"} -->
<p class="has-text-normal-darkbg-color has-text-color"><?php echo esc_html__( 'No posts.', 'x-t9' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"mt-0","style":{"border":{"top":{"color":"var:preset|color|border-normal","width":"1px"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull mt-0" style="border-top-color:var(--wp--preset--color--border-normal);border-top-width:1px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:navigation {"showSubmenuIcon":false,"overlayMenu":"never","icon":"menu","className":"is-style-nav\u002d\u002dtext-inline","fontSize":"x-small","layout":{"type":"flex","orientation":"horizontal"}} /-->

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","textAlign":"center"}},"fontSize":"x-small"} -->
<p class="has-text-align-center has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
