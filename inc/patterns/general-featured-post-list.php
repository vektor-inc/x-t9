<?php
/**
 * Featured Post List
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Featured post list', 'x-t9' ),
	'categories' => array( 'featured' ),
	'content'    => '<!-- wp:cover {"overlayColor":"bg-light-gray","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem"}}}} -->
	<div class="wp-block-cover alignfull is-light" style="padding-top:3rem;padding-bottom:3rem"><span aria-hidden="true" class="has-bg-light-gray-background-color has-background-dim-100 wp-block-cover__gradient-background has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0px"}}}} -->
	<h2 class="has-text-align-center" id="information" style="margin-top:0px">Information</h2>
	<!-- /wp:heading -->
	
	<!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group"><!-- wp:separator {"color":"border-light","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-background has-border-light-background-color has-border-light-color is-style-wide"/>
	<!-- /wp:separator -->
	
	<!-- wp:query {"queryId":9,"query":{"perPage":"2","pages":"0","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"displayLayout":{"type":"list","columns":3},"layout":{"inherit":false}} -->
	<div class="wp-block-query">
	
	<!-- wp:pattern {"slug":"x-t9/post-template-image-left"} /-->
	
	<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} -->
	<!-- wp:query-pagination-previous {"label":"Prev"} /-->
	
	<!-- wp:query-pagination-numbers /-->
	
	<!-- wp:query-pagination-next {"label":"Next"} /-->
	<!-- /wp:query-pagination --></div>
	<!-- /wp:query --></div>
	<!-- /wp:group --></div></div>
	<!-- /wp:cover -->',
);
