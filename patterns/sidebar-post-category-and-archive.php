<?php
/**
 * Title: Sidebar Category / Archive / tags
 * Slug: x-t9/sidebar/sidebar-post-category-and-archive
 * Categories: sidebar
 */
?>
<!-- wp:heading {"level":4,"className":"has-large-font-size","fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Category', 'x-t9' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:categories {"showHierarchy":true} /-->

<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":4,"className":"has-large-font-size","fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Archive', 'x-t9' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:archives /-->

<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":4,"className":"has-large-font-size","fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size"><?php esc_html_e( 'Tag Cloud', 'x-t9' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-xxs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xxs"></div>
<!-- /wp:spacer -->

<!-- wp:tag-cloud {"smallestFontSize":"0.85rem","largestFontSize":"0.85rem","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} /-->