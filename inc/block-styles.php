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
		'label'        => __( 'Active Border Bottom', 'x-t9' ),
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

/* Spacer --------------------------------------------------------------- */
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-xxs',
		'label'        => __( 'XXS', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-xs',
		'label'        => __( 'XS', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-sm',
		'label'        => __( 'S', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-md',
		'label'        => __( 'M', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-lg',
		'label'        => __( 'L', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	)
);
register_block_style(
	'core/spacer',
	array(
		'name'         => 'spacer-xl',
		'label'        => __( 'XL', 'x-t9' ),
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

/* Scrolled ----------------------------------------------------------- */
register_block_style(
	'core/group',
	array(
		'name'         => 'scrolled-header-fixed',
		'label'        => __( 'Fixed header', 'x-t9' ),
		'style_handle' => 'x-t9-style',
	),
);
