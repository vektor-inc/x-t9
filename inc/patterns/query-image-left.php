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
	'content'    => '<!-- wp:query {"query":{"perPage":"10","pages":"0","offset":0,"postType":"post","categoryIds":[],"tagIds":[],"order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"inherit":true}} -->
	<div class="wp-block-query">

	<!-- wp:separator {"className":"has-text-color has-background has-border-normal-background-color is-style-wide"} -->
	<hr class="wp-block-separator has-alpha-channel-opacity has-text-color has-background has-border-normal-background-color is-style-wide"/>
	<!-- /wp:separator -->	

	<!-- wp:post-template -->
	<!-- wp:pattern {"slug":"x-t9/post-template-image-left"} /-->
	<!-- /wp:post-template -->

	<!-- wp:spacer {"height":"","className":"is-style-spacer-md"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->
	
	<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"center","orientation":"horizontal","flexWrap":"wrap"}} -->
	<!-- wp:query-pagination-previous {"label":"' . esc_html__( 'Prev', 'x-t9' ) . '"} /-->

	<!-- wp:query-pagination-numbers /-->
	
	<!-- wp:query-pagination-next {"label":"' . esc_html__( 'Next', 'x-t9' ) . '"} /-->
	<!-- /wp:query-pagination -->

	<!-- wp:spacer {"height":"","className":"is-style-spacer-md"} -->
	<div style="height:" aria-hidden="true" class="wp-block-spacer is-style-spacer-md"></div>
	<!-- /wp:spacer -->

	</div>
	<!-- /wp:query -->',
);
