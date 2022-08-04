<?php
/**
 * Footer BG Bright 2col
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Footer BG Bright 2col', 'x-t9' ),
	'categories' => array( 'footer' ),
	'blockTypes' => array( 'core/template-part/footer' ),
	'content'    => '
	<!-- wp:separator {"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"backgroundColor":"bg-light-gray","textColor":"text-normal"} -->
<div class="wp-block-group has-text-normal-color has-bg-light-gray-background-color has-text-color has-background"><!-- wp:group {"style":{"spacing":{"padding":{"top":"3rem","bottom":"2rem"}}},"layout":{"inherit":true}} -->
<div class="wp-block-group" style="padding-top:3rem;padding-bottom:2rem"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:image {"id":2623,"width":180,"sizeSlug":"full","linkDestination":"media"} -->
<figure class="wp-block-image size-full is-resized"><a href="http://xt9dev.local/wp-content/uploads/2021/01/head-logo-bk.png"><img src="http://xt9dev.local/wp-content/uploads/2021/01/head-logo-bk.png" alt="" class="wp-image-2623" width="180"/></a></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:navigation {"showSubmenuIcon":false,"overlayMenu":"never","className":"is-style-default","layout":{"type":"flex","orientation":"horizontal","justifyContent":"right"},"fontSize":"small"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"mt-0","layout":{"inherit":true}} -->
<div class="wp-block-group mt-0"><!-- wp:separator {"backgroundColor":"border-normal","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-border-normal-color has-alpha-channel-opacity has-border-normal-background-color has-background is-style-wide"/>
<!-- /wp:separator -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"2rem","bottom":"0.5rem"}}},"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:2rem;padding-bottom:0.5rem"><!-- wp:paragraph {"align":"center","style":{"typography":{"textTransform":"uppercase"}},"textColor":"text-normal","fontSize":"x-small"} -->
<p class="has-text-align-center has-text-normal-color has-text-color has-x-small-font-size" style="text-transform:uppercase">Copyright (C) X-T9 All Rights Reserved.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
