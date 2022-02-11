<?php
/**
 * Posts media block pattern
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'Posts Media', 'X-T9' ),
	'categories' => array( 'query' ),
	'blockTypes' => array( 'core/query' ),
	'content'    => '<!-- wp:query {"query":{"perPage":"10","pages":"0","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"list","columns":3},"layout":{"inherit":true}} -->
	<div class="wp-block-query"><!-- wp:post-template -->
	<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"padding":{"top":"1.75em"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-top" style="padding-top:1.75em"><!-- wp:column {"verticalAlignment":"top","width":"33.33%"} -->
	<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:33.33%"><!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} /--></div>
	<!-- /wp:column -->
	
	<!-- wp:column {"verticalAlignment":"top","width":"66.66%"} -->
	<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:66.66%"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} -->
	<div class="wp-block-group"><!-- wp:post-date /--></div>
	<!-- /wp:group -->
	
	<!-- wp:post-title {"isLink":true} /-->
	
	<!-- wp:post-excerpt {"moreText":"' . esc_html__( 'Read more', 'X-T9' ) . '"} /--></div>
	<!-- /wp:column --></div>
	<!-- /wp:columns -->
	
	<!-- wp:separator {"color":"border-light","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-background has-border-light-background-color has-border-light-color is-style-wide"/>
	<!-- /wp:separator -->
	<!-- /wp:post-template -->
	
	<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} -->
	<!-- wp:query-pagination-previous {"label":"' . esc_html__( 'Prev', 'X-T9' ) . '"} /-->
	
	<!-- wp:query-pagination-numbers /-->
	
	<!-- wp:query-pagination-next {"label":"' . esc_html__( 'Next', 'X-T9' ) . '"} /-->
	<!-- /wp:query-pagination --></div>
	<!-- /wp:query -->',
);
