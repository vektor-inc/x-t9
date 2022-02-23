<?php
/**
 * Posts media block pattern
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'X-T9 Query image at left', 'x-t9' ),
	'categories' => array( 'query' ),
	'blockTypes' => array( 'core/query' ),
	'content'    => '<!-- wp:query {"query":{"perPage":"10","pages":"0","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"list","columns":3},"layout":{"inherit":false}} -->
	<div class="wp-block-query"><!-- wp:pattern {"slug":"x-t9/post-template-image-left"} /-->	
	
	<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} -->
	<!-- wp:query-pagination-previous {"label":"' . esc_html__( 'Prev', 'x-t9' ) . '"} /-->
	
	<!-- wp:query-pagination-numbers /-->
	
	<!-- wp:query-pagination-next {"label":"' . esc_html__( 'Next', 'x-t9' ) . '"} /-->
	<!-- /wp:query-pagination --></div>
	<!-- /wp:query -->',
);
