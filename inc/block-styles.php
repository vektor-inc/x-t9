<?php
/**
 * Register Block Styles
 * 
 * @package x-t9
 */

 register_block_style(
	'core/navigation',
	array(
		'name'         => 'nav--active-border-bottom',
		'label'        => __( 'Item Active Border Bottom', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	),
);
register_block_style(
	'core/navigation',
	array(
		'name'         => 'nav--text-inline',
		'label'        => __( 'Text Inline', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);