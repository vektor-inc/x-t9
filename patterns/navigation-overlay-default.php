<?php
/**
 * Title: Overlay Default
 * Slug: x-t9/navigation-overlay-default
 * Categories: navigation
 * Block Types: core/template-part/navigation-overlay
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.0
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100svh"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"backgroundColor":"bg-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-bg-primary-background-color has-background" style="min-height:100svh;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);font-style:normal;font-weight:400"><!-- wp:navigation-overlay-close /-->

<!-- wp:search {"showLabel":false,"width":100,"widthUnit":"%","buttonText":"","buttonUseIcon":true,"style":{"spacing":{"margin":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} /-->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:navigation {"textColor":"text-normal","showSubmenuIcon":false,"submenuVisibility":"always","overlayMenu":"never","className":"is-style-nav\u002d\u002dvertical-with-hr","layout":{"orientation":"vertical"}} /-->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","width":100,"fontSize":"medium"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-background-color has-background has-medium-font-size has-custom-font-size wp-element-button"><?php echo esc_html__( 'Contact', 'x-t9' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
