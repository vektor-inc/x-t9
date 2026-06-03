<?php
/**
 * Title: Post List Text Inline Offset Up
 * Slug: x-t9/post-list-text-inline-offset-up
 * Categories: post-list-section
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.0
 */

?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"align":"full","style":{"color":{"background":"#f5f5f5"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f5f5f5"><!-- wp:spacer {"height":"var:preset|spacing|60","className":"is-style-spacer-lg"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"className":"vk_block-margin-0\u002d\u002dmargin-bottom is-style-vk-heading-plain","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}},"typography":{"textAlign":"center"}},"anchor":"information"} -->
<h2 class="wp-block-heading has-text-align-center vk_block-margin-0--margin-bottom is-style-vk-heading-plain" id="information" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html__( 'Information', 'x-t9' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom has-vk-color-primary-color has-text-color","style":{"typography":{"textAlign":"center"}},"textColor":"vk-color-primary","fontSize":"small"} -->
<p class="has-text-align-center vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom has-vk-color-primary-color has-text-color has-small-font-size">News / Blog</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"var:preset|spacing|60","className":"is-style-spacer-lg"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"margin":{"top":"-3rem"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:-3rem;padding-top:0;padding-right:var(--wp--preset--spacing--60);padding-bottom:0;padding-left:var(--wp--preset--spacing--60)"><!-- wp:spacer {"height":"var:preset|spacing|50","className":"is-style-spacer-md"} -->
<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":6,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]}} -->
<div class="wp-block-query"><!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:post-template {"className":"vk_block-margin-0\u002d\u002dmargin-top","layout":{"type":"default"}} -->
<!-- wp:spacer {"height":"var:preset|spacing|30","className":"is-style-spacer-xs"} -->
<div style="height:var(--wp--preset--spacing--30)" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"className":"vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top"><!-- wp:column {"verticalAlignment":"center","width":"240px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:240px"><!-- wp:columns {"isStackedOnMobile":false,"className":"vk_block-margin-0\u002d\u002dmargin-bottom","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"1em"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile vk_block-margin-0--margin-bottom"><!-- wp:column {"verticalAlignment":"center","width":"130px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:130px"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"textColor":"text-secondary","fontSize":"small"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"150px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:150px"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"elements":{"link":{"color":{"text":"#333333"}}}},"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-title {"level":6,"isLink":true,"className":"text-light ","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"#333333"}}},"color":{"text":"#333333"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|30","className":"is-style-spacer-xs"} -->
<div style="height:var(--wp--preset--spacing--30)" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"className":"is-style-wide vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php echo esc_html__( 'No posts.', 'x-t9' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"var:preset|spacing|40","className":"is-style-spacer-sm"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html__( 'Post List', 'x-t9' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
