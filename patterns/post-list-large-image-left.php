<?php
/**
 * Title: Post List Large Image Left
 * Slug: x-t9/post-list-large-image-left
 * Categories: post-list-section
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.0
 */

?>
<!-- wp:group {"metadata":{"categories":["post-list-section"],"name":"Post List Large Image Left"},"align":"full","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"bg-secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-bg-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:spacer {"className":"is-style-spacer-lg"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"anchor":"information"} -->
<h2 class="wp-block-heading has-text-align-center" id="information"><?php echo esc_html__( 'Information', 'x-t9' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom has-vk-color-primary-color has-text-color","style":{"typography":{"textAlign":"center"}},"textColor":"vk-color-primary","fontSize":"small"} -->
<p class="has-text-align-center vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom has-vk-color-primary-color has-text-color has-small-font-size">News / Blog</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"var:preset|spacing|60","className":"is-style-spacer-md"} -->
<div style="height:var(--wp--preset--spacing--60)" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:separator {"opacity":"css","className":"is-style-wide","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-css-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:query {"query":{"perPage":"2","pages":"0","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[]},"layout":{"inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns are-vertically-aligned-top" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50)"><!-- wp:column {"verticalAlignment":"top","width":"33.33%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:33.33%"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"1px"}},"borderColor":"border-normal"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:66.66%"><!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"bottom":"0rem"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","margin":{"top":"var:preset|spacing|30","bottom":"0"}}},"textColor":"text-secondary","layout":{"type":"flex","allowOrientation":false}} -->
<div class="wp-block-group has-text-secondary-color has-text-color" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:0"><!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"spacing":{"margin":{"top":"0"}}}} /-->

<!-- wp:post-terms {"term":"category","prefix":"<?php echo esc_html__( 'Category : ', 'x-t9' ); ?>"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"<?php echo esc_html__( 'Read more', 'x-t9' ); ?>","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","right":"0","bottom":"0","left":"0"}}}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"className":"has-text-color has-background has-border-normal-background-color is-style-wide"} -->
<hr class="wp-block-separator has-alpha-channel-opacity has-text-color has-background has-border-normal-background-color is-style-wide"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50);margin-bottom:0"><!-- wp:button {"fontSize":"x-small"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-x-small-font-size has-custom-font-size wp-element-button" href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>"><?php echo esc_html__( 'Post List', 'x-t9' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:spacer {"className":"is-style-spacer-lg"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
