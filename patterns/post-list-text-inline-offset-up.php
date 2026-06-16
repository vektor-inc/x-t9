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

<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"textAlign":"center"}},"anchor":"information"} -->
<h2 class="wp-block-heading has-text-align-center" id="information" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Information', 'x-t9' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size" style="margin-top:0;margin-bottom:0">News / Blog</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"var:preset|spacing|60","className":"is-style-spacer-lg"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"margin":{"top":"-3rem"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="margin-top:-3rem;padding-top:0;padding-right:var(--wp--preset--spacing--60);padding-bottom:0;padding-left:var(--wp--preset--spacing--60)"><!-- wp:spacer {"height":"var:preset|spacing|50","className":"is-style-spacer-md"} -->
<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:query {"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"metadata":{"categories":["posts"],"name":"X-T9 Query (Post List) Text Inline","patternName":"x-t9/query-text-inline"}} -->
<div class="wp-block-query"><!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:post-template {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<!-- wp:spacer {"height":"var:preset|spacing|40","className":"is-style-default"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer is-style-default"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"240px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:240px"><!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"1em"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"140px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:140px"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"textColor":"text-secondary","fontSize":"small"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"160px"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:160px"><!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"elements":{"link":{"color":{"text":"#333333"}}}},"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":""} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:post-title {"level":6,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"#333333"}}},"color":{"text":"#333333"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"var:preset|spacing|40","className":"is-style-default"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer is-style-default"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php echo esc_html__( 'No posts.', 'x-t9' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"var:preset|spacing|60","className":"is-style-spacer-md"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><?php echo esc_html__( 'Post List', 'x-t9' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
