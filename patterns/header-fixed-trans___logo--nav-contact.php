<?php
/**
 * Title: Fixed Trans | Logo -- Nav - Contact
 * Slug: x-t9/header-fixed-trans___logo--nav-contact
 * Categories: header
 * Block Types: core/template-part/header
 * Description:
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.39.0
 */

?>
<!-- wp:group {"tagName":"header","className":"alignfull","style":{"position":{"type":"fixed","top":"0px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"color":{"background":"#00000066"},"elements":{"link":{"color":{"text":"var:preset|color|bg-primary"}}}},"textColor":"bg-primary","layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull has-bg-primary-color has-text-color has-background has-link-color" style="background-color:#00000066;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:site-logo {"width":160,"className":"auto-size","style":{"color":{"duotone":["#fff","#ffffff"]}}} /-->

<!-- wp:group {"className":"site-logo\u002d\u002dset","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","allowOrientation":false,"flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group site-logo--set" style="padding-top:0;padding-bottom:0"><!-- wp:navigation {"overlay":"navigation-overlay","icon":"menu","className":"nav\u002d\u002dopen\u002d\u002dlg-up nav\u002d\u002dfirst-nowrap is-style-nav\u002d\u002dactive-border-bottom","fontSize":"x-small","layout":{"type":"flex","justifyContent":"right","orientation":"horizontal","flexWrap":"nowrap"}} /-->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"className":"is-style-outline","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"typography":{"lineHeight":"1"}},"fontSize":"small"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-small-font-size has-custom-font-size wp-element-button" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);line-height:1"><?php echo esc_html__( 'Contact', 'x-t9' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></header>
<!-- /wp:group -->
