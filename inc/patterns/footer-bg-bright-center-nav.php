<?php
/**
 * Footer BG Bright Center Nav
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Bright Center Nav', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '
	<!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"backgroundColor":"bg-light-gray","className":"has-text-color"} -->
<div class="wp-block-group has-text-color has-bg-light-gray-background-color has-background"><!-- wp:group {"layout":{"inherit":true}} -->
<div class="wp-block-group"><!-- wp:spacer {"className":"is-style-spacer-lg"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer -->

<!-- wp:site-logo {"width":200,"align":"center"} /-->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:navigation {"className":"is-style-nav\u002d\u002dtext-inline","layout":{"type":"flex","justifyContent":"center"},"fontSize":"x-small"} /-->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:social-links {"iconColor":"text-secondary","iconColorValue":"rgba(0,0,0,0.5)","size":"has-normal-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"1rem"}}} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"https://wordpress.org/","service":"facebook"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"twitter"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"instagram"} /-->

<!-- wp:social-link {"url":"https://wordpress.org/","service":"youtube"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:spacer {"className":"is-style-spacer-md"} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:0.5rem;padding-bottom:0.5rem"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"text-secondary","fontSize":"x-small"} -->
<p class="has-text-align-center has-text-secondary-color has-text-color has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
