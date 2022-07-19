<?php
/**
 * Featured Post List Section
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Featured post list', 'x-t9' ),
	'categories' => array( 'featured' ),
	'content'    => '<!-- wp:cover {"overlayColor":"bg-light-gray","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px"}}}} -->
	<div class="wp-block-cover alignfull is-light" style="padding-top:0px;padding-bottom:0px"><span aria-hidden="true" class="has-bg-light-gray-background-color has-background-dim-100 wp-block-cover__gradient-background has-background-dim"></span><div class="wp-block-cover__inner-container">
	<!-- wp:spacer {"height":"","className":"is-style-spacer-xl"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-xl"></div>
	<!-- /wp:spacer -->
	<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0px"}}}} -->
	<h2 class="has-text-align-center" id="information" style="margin-top:0px">Information</h2>
	<!-- /wp:heading -->
	<!-- wp:spacer {"height":"","className":"is-style-spacer-md"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	<!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group"><!-- wp:separator {"color":"border-normal","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-background has-border-normal-background-color has-border-normal-color is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:query {"queryId":9,"query":{"perPage":"2","pages":"0","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list","columns":3},"layout":{"inherit":false}} -->
	<div class="wp-block-query">
	
	<!-- wp:pattern {"slug":"x-t9/post-template-image-left"} /-->

	<!-- wp:spacer {"height":"","className":"is-style-spacer-md"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons"><!-- wp:button {"fontSize":"x-small"} -->
	<div class="wp-block-button has-custom-font-size has-x-small-font-size"><a class="wp-block-button__link" href="/information/">Information list</a></div>
	<!-- /wp:button --></div>
	<!-- /wp:buttons --></div>
	<!-- /wp:query -->
	
	<!-- wp:spacer {"height":"","className":"is-style-spacer-xl"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-xl"></div>
	<!-- /wp:spacer -->
	
	</div><!-- /wp:group --></div>
	</div><!-- /wp:cover -->',
);
