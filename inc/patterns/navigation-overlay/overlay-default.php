<?php
/**
 * Overlay Default
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Overlay Default', 'x-t9' ),
	'categories' => array( 'navigation' ),
	'blockTypes' => array( 'core/template-part/navigation-overlay' ),
	'content'    => '<!-- wp:group {"metadata":{"patternName":"x-t9/navigation-overlay/overlay-default","name":"Overlay Default","categories":["navigation"]},"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"dimensions":{"minHeight":"100svh"}},"backgroundColor":"bg-primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-bg-primary-background-color has-background" style="min-height:100svh;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:navigation-overlay-close /-->

<!-- wp:search {"showLabel":false,"width":100,"widthUnit":"%","buttonText":"","buttonUseIcon":true,"style":{"spacing":{"margin":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} /-->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"className":"is-style-wide","backgroundColor":"border-normal"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:navigation {"submenuVisibility":"click","overlayMenu":"never","className":"is-style-nav\u002d\u002dvertical-with-hr","layout":{"orientation":"vertical"}} /-->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","width":100} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button">Contact</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->',
);
