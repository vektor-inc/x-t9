<?php
/**
 * Title: Sidebar Category / Archive
 * Slug: x-t9/sidebar-post-category-and-archive
 * Categories: sidebar
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.0
 */

?>
<!-- wp:heading {"level":4,"className":"has-large-font-size","fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Category', 'x-t9' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:categories {"showHierarchy":true} /-->

<!-- wp:heading {"level":4,"className":"has-large-font-size","fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Archive', 'x-t9' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:archives /-->

<!-- wp:heading {"level":4,"className":"has-large-font-size","fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Tag Cloud', 'x-t9' ); ?></h4>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-xxs"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xxs"></div>
<!-- /wp:spacer -->

<!-- wp:tag-cloud {"smallestFontSize":"0.85rem","largestFontSize":"0.85rem","style":{"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"}}}} /-->
