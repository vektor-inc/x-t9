<?php
/**
 * Register Block Styles
 *
 * @package vektor-inc/x-t9
 */

/* Navigation ----------------------------------------------------------- */
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
	'core/navigation',
	array(
		'name'         => 'nav--vertical-with-hr',
		'label'        => __( 'Vertical with hr', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/navigation',
	array(
		'name'         => 'nav--vertical-text-list',
		'label'        => __( 'Vertical text list', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);

/* Spacer --------------------------------------------------------------- */
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
/* Layout ----------------------------------------------------------- */
register_block_style(
	'core/columns',
	array(
		'name'         => 'main-layout',
		'label'        => __( 'Main layout', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	),
);
register_block_style(
	'core/column',
	array(
		'name'         => 'main-layout-sidebar',
		'label'        => __( 'Sidebar', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	),
);
