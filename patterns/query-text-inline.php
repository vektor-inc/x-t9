<?php
/**
 * Title: X-T9 Query (Post List) Text Inline
 * Slug: x-t9/query-text-inline
 * Categories: query
 * Block Types: core/query
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.41.0
 */

?>
<!-- wp:query {"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"parents":[]},"metadata":{"categories":["posts"],"name":"X-T9 Query (Post List) Text Inline","patternName":"x-t9/query-text-inline"}} -->
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

<!-- wp:spacer {"height":"var:preset|spacing|50","className":"is-style-default"} -->
<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer is-style-default"></div>
<!-- /wp:spacer -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。","style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php echo esc_html__( 'No posts.', 'x-t9' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->

<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} -->
<!-- wp:query-pagination-previous {"label":"<?php echo esc_html__( 'Prev', 'x-t9' ); ?>"} /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next {"label":"<?php echo esc_html__( 'Next', 'x-t9' ); ?>"} /-->
<!-- /wp:query-pagination -->

<!-- wp:spacer {"height":"var:preset|spacing|60","className":"is-style-spacer-md"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer --></div>
<!-- /wp:query -->
