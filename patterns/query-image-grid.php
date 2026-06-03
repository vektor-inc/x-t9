<?php
/**
 * Title: X-T9 Query (Post List) Image Grid
 * Slug: x-t9/query-image-grid
 * Categories: query
 * Block Types: core/query
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.41.0
 */

?>
<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"metadata":{"categories":["posts"],"name":"X-T9 Query (Post List) Grid","patternName":"x-t9/query-image-grid"}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"vk_block-margin-0\u002d\u002dmargin-top","style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":"260px"}} -->
<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
<div class="wp-block-group" style="min-height:100%"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|40","className":"is-style-default"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer is-style-default"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"fontSize":"small"} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"textDecoration":"none"},"elements":{"link":{"color":{"text":"#333333"}}}},"textColor":"text-secondary","fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"var:preset|spacing|30","className":"is-style-default"} -->
<div style="height:var(--wp--preset--spacing--30)" aria-hidden="true" class="wp-block-spacer is-style-default"></div>
<!-- /wp:spacer -->

<!-- wp:post-title {"level":6,"isLink":true,"className":"text-light ","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"elements":{"link":{"color":{"text":"#333333"}}},"color":{"text":"#333333"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"medium"} /-->

<!-- wp:spacer {"height":"var:preset|spacing|40","className":"is-style-default"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer is-style-default"></div>
<!-- /wp:spacer -->

<!-- wp:post-excerpt {"style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:read-more {"content":"<?php echo esc_html__( 'Read more ≫', 'x-t9' ); ?>","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"var:preset|spacing|60","className":"is-style-default"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer is-style-default"></div>
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
