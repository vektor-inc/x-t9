<?php
/**
 * Title: X-T9 Query (Post List) image left small
 * Slug: x-t9/query-subcontent
 * Categories: query
 * Block Types: core/query
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.0
 */

?>
<!-- wp:query {"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:spacer {"className":"is-style-spacer-xs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"width":"60px","height":"60px"} /-->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-date {"textColor":"text-secondary","fontSize":"x-small"} /-->

<!-- wp:post-title {"level":6,"isLink":true,"fontSize":"small"} /--></div>
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
<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。"} -->
<p><?php echo esc_html__( 'No posts.', 'x-t9' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->
