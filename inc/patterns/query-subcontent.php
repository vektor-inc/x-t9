<?php
/**
 * Posts media small block pattern
 *
 * @package vektor-inc/x-t9
 */

return array(
	'title'      => __( 'X-T9 Query image left small', 'x-t9' ),
	'categories' => array( 'query' ),
	'blockTypes' => array( 'core/query' ),
	'content'    => '<!-- wp:query {"queryId":1,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
	<div class="wp-block-query">

	<!-- wp:post-template -->
	<!-- wp:pattern {"slug":"x-t9/post-template-subcontent"} /-->
	<!-- /wp:post-template -->
	
	<!-- wp:query-no-results -->
	<!-- wp:paragraph {"placeholder":"クエリーが何も結果を返さない場合に表示するテキストまたはブロックを追加します。","textColor":"text-normal-darkbg"} -->
	<p class="has-text-normal-darkbg-color has-text-color">投稿はありません</p>
	<!-- /wp:paragraph -->
	<!-- /wp:query-no-results --></div>
	<!-- /wp:query -->',
);
