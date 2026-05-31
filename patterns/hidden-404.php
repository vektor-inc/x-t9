<?php
/**
 * Title: 404 Content
 * Slug: x-t9/hidden-404
 * Categories: pages
 * Inserter: no
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.0
 */

?>
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__( 'This page could not be found. Maybe try a search?', 'x-t9' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:spacer {"className":"is-style-spacer-sm"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->
<!-- wp:search {"label":"<?php echo esc_html__( 'Search', 'x-t9' ); ?>","showLabel":false,"width":50,"widthUnit":"%","buttonText":"Search","buttonUseIcon":true,"align":"center"} /-->
