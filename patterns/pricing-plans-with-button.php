<?php
/**
 * Title: Pricing Plans Section
 * Slug: x-t9/pricing-plans-with-button
 * Categories: pricing
 * Description: Block pattern for displaying three pricing plans. More plans can also be added.
 * keywords: pricing
 *
 * @package WordPress
 * @subpackage x-t9
 * @since X-T9 1.41.0
 */

?>
<!-- wp:group {"metadata":{"name":"Pricing Plans"},"align":"full","style":{"color":{"background":"#f8f8f8"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f8f8f8"><!-- wp:spacer {"className":"is-style-spacer-lg","anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"className":"is-style-vk-heading-plain","style":{"typography":{"textAlign":"center"}}} -->
<h2 class="wp-block-heading has-text-align-center is-style-vk-heading-plain">Pricing Plans</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"has-vk-color-primary-color has-text-color has-link-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|vk-color-primary"}}},"typography":{"textAlign":"center"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"vk-color-primary"} -->
<p class="has-text-align-center has-vk-color-primary-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0">Pricing Guide</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"className":"is-style-spacer-md","anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
<!-- /wp:spacer -->

<!-- wp:group {"layout":{"type":"grid","minimumColumnWidth":"270px","columnCount":null}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"},"border":{"color":"#e5e5e5","width":"1px"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"white","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
<div class="wp-block-group has-border-color has-white-background-color has-background" style="border-color:#e5e5e5;border-width:1px;min-height:100%;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":"is-style-vk-heading-plain vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"typography":{"fontSize":"1rem","letterSpacing":"1px","textAlign":"center"},"spacing":{"padding":{"top":"5px","right":"10px","bottom":"5px","left":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|bg-primary"}}}},"backgroundColor":"complementary","textColor":"bg-primary"} -->
<h4 class="wp-block-heading has-text-align-center is-style-vk-heading-plain vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top has-bg-primary-color has-complementary-background-color has-text-color has-background has-link-color" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px;font-size:1rem;letter-spacing:1px">Light</h4>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-sm","style":{"layout":{}},"anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"className":"is-style-vk-heading-plain vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"typography":{"letterSpacing":"1px","fontStyle":"normal","fontWeight":"700","lineHeight":"1","textAlign":"center"}},"fontSize":"xx-huge"} -->
<h2 class="wp-block-heading has-text-align-center is-style-vk-heading-plain vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top has-xx-huge-font-size" style="font-style:normal;font-weight:700;letter-spacing:1px;line-height:1">LIGHT</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-xs","style":{"layout":{}},"anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"xx-large"} -->
<p class="has-text-align-center vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom has-xx-large-font-size" style="line-height:1">From $1,000</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"className":"is-style-spacer-sm","style":{"layout":{}},"anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom","style":{"typography":{"fontSize":"0.85rem","textAlign":"left"}}} -->
<p class="has-text-align-left vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom" style="font-size:0.85rem">This plan uses a pre-designed template for production. It is ideal when budget or timeline constraints are a priority.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex"}} -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"style":{"typography":{"textAlign":"center"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-text-align-center wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">Select</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"},"border":{"color":"#e5e5e5","width":"1px"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"white","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
<div class="wp-block-group has-border-color has-white-background-color has-background" style="border-color:#e5e5e5;border-width:1px;min-height:100%;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":"is-style-vk-heading-plain vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"typography":{"fontSize":"1rem","letterSpacing":"1px","textAlign":"center"},"spacing":{"padding":{"top":"5px","right":"10px","bottom":"5px","left":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|bg-primary"}}}},"backgroundColor":"complementary","textColor":"bg-primary"} -->
<h4 class="wp-block-heading has-text-align-center is-style-vk-heading-plain vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top has-bg-primary-color has-complementary-background-color has-text-color has-background has-link-color" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px;font-size:1rem;letter-spacing:1px">Basic</h4>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-sm","style":{"layout":{}},"anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"className":"is-style-vk-heading-plain vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"typography":{"letterSpacing":"1px","fontStyle":"normal","fontWeight":"700","lineHeight":"1","textAlign":"center"}},"fontSize":"xx-huge"} -->
<h2 class="wp-block-heading has-text-align-center is-style-vk-heading-plain vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top has-xx-huge-font-size" style="font-style:normal;font-weight:700;letter-spacing:1px;line-height:1">BASIC</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-xs","style":{"layout":{}},"anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"xx-large"} -->
<p class="has-text-align-center vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom has-xx-large-font-size" style="line-height:1">From $1,500~</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"className":"is-style-spacer-sm","style":{"layout":{}},"anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom","style":{"typography":{"fontSize":"0.85rem","textAlign":"left"}}} -->
<p class="has-text-align-left vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom" style="font-size:0.85rem">This plan is based on a pre-designed template, with original design adjustments applied where needed.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex"}} -->
<div class="wp-block-buttons"><!-- wp:button {"width":100,"style":{"typography":{"textAlign":"center"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-text-align-center wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">Select</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"},"border":{"color":"#e5e5e5","width":"1px"},"dimensions":{"minHeight":"100%"}},"backgroundColor":"white","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
<div class="wp-block-group has-border-color has-white-background-color has-background" style="border-color:#e5e5e5;border-width:1px;min-height:100%;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":4,"className":"is-style-vk-heading-plain vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"typography":{"fontSize":"1rem","letterSpacing":"1px","textAlign":"center"},"spacing":{"padding":{"top":"5px","right":"10px","bottom":"5px","left":"10px"}},"elements":{"link":{"color":{"text":"var:preset|color|bg-primary"}}}},"backgroundColor":"complementary","textColor":"bg-primary"} -->
<h4 class="wp-block-heading has-text-align-center is-style-vk-heading-plain vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top has-bg-primary-color has-complementary-background-color has-text-color has-background has-link-color" style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px;font-size:1rem;letter-spacing:1px">Custom</h4>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-sm","style":{"layout":{}},"anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"className":"is-style-vk-heading-plain vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"typography":{"letterSpacing":"1px","fontStyle":"normal","fontWeight":"700","lineHeight":"1","textAlign":"center"}},"fontSize":"xx-huge"} -->
<h2 class="wp-block-heading has-text-align-center is-style-vk-heading-plain vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top has-xx-huge-font-size" style="font-style:normal;font-weight:700;letter-spacing:1px;line-height:1">CUSTOM</h2>
<!-- /wp:heading -->

<!-- wp:spacer {"className":"is-style-spacer-xs","anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom","style":{"typography":{"lineHeight":"1","textAlign":"center"}},"fontSize":"x-large"} -->
<p class="has-text-align-center vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom has-x-large-font-size" style="line-height:1">Custom Quote</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"className":"is-style-spacer-xs","anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-xs"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-bottom vk_block-margin-0\u002d\u002dmargin-top","style":{"typography":{"lineHeight":"1.2","textAlign":"center"}}} -->
<p class="has-text-align-center vk_block-margin-0--margin-bottom vk_block-margin-0--margin-top" style="line-height:1.2">*Free estimate</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"className":"is-style-spacer-sm","anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-sm"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"className":"vk_block-margin-0\u002d\u002dmargin-top vk_block-margin-0\u002d\u002dmargin-bottom","style":{"typography":{"fontSize":"0.85rem","textAlign":"left"}}} -->
<p class="has-text-align-left vk_block-margin-0--margin-top vk_block-margin-0--margin-bottom" style="font-size:0.85rem">Every element can be fully customized. This plan is ideal for large companies or businesses that require a web application tailored to a specific industry.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"blockGap":{"top":"0"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex"}} -->
<div class="wp-block-buttons" style="padding-top:0;padding-bottom:0"><!-- wp:button {"width":100,"style":{"typography":{"textAlign":"center"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-button has-custom-width wp-block-button__width-100"><a class="wp-block-button__link has-text-align-center wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">Select</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:spacer {"className":"is-style-spacer-lg","anchor":null} -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer is-style-spacer-lg"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->
