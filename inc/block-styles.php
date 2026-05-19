<?php
/**
 * Register Block Styles
 *
 * @package vektor-inc/x-t9
 */

add_action(
	'after_setup_theme',
	function () {

		/* Navigation ----------------------------------------------------------- */
		register_block_style(
			'core/navigation',
			array(
				'name'         => 'nav--active-border-bottom',
				'label'        => __( 'Horizontal Active Border Bottom', 'x-t9' ),
				'style_handle' => 'x-t9-style',
			),
		);
		register_block_style(
			'core/navigation',
			array(
				'name'         => 'nav--text-inline',
				'label'        => __( 'Horizontal Text Inline', 'x-t9' ),
				'style_handle' => 'x-t9-style',
			)
		);
		register_block_style(
			'core/navigation',
			array(
				'name'         => 'nav--vertical-with-hr',
				'label'        => __( 'Vertical with HR', 'x-t9' ),
				'style_handle' => 'x-t9-style',
			)
		);
		register_block_style(
			'core/navigation',
			array(
				'name'         => 'nav--vertical-with-hr-and-no-fold',
				'label'        => __( 'Vertical with HR No Fold', 'x-t9' ),
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
		register_block_style(
			'core/spacer',
			array(
				'name'         => 'spacer-xxl',
				'label'        => __( 'XXL', 'x-t9' ),
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

		/* Header Setting ----------------------------------------------------- */
		// グループブロックをヘッダーとして使う際の表示方式を選べる Block Style 群
		// Block styles that let a Group block be used as a header with different display modes
		register_block_style(
			'core/group',
			array(
				// 本当は header--scrolled に変更したいが、旧版利用者が混乱するためそのまま
				// 'name'         => 'header--scrolled',
				'name'         => 'scrolled-header-fixed',
				'label'        => __( 'Header: Scrolled', 'x-t9' ),
				'style_handle' => 'x-t9-style',
			)
		);
		register_block_style(
			'core/group',
			array(
				'name'         => 'header--fixed',
				'label'        => __( 'Header: Fixed', 'x-t9' ),
				'style_handle' => 'x-t9-style',
			)
		);
		register_block_style(
			'core/group',
			array(
				'name'         => 'header--sticky',
				'label'        => __( 'Header: Sticky', 'x-t9' ),
				'style_handle' => 'x-t9-style',
			)
		);
	}
);
