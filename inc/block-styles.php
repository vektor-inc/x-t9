<?php
/**
 * Register Block Styles
 *
 * @package vektor-inc/x-t9
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

register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-xs',
		'label'        => __( 'X Small', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-sm',
		'label'        => __( 'Small', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-md',
		'label'        => __( 'Medium', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-lg',
		'label'        => __( 'Large', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-xl',
		'label'        => __( 'X Large', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
