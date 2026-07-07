<?php
/**
 * Tests for xt9_fix_global_styles_print_order() function.
 * xt9_fix_global_styles_print_order() 関数のテスト。
 *
 * @package x-t9
 */

/**
 * Class Test_Xt9_Fix_Global_Styles_Print_Order
 */
class Test_Xt9_Fix_Global_Styles_Print_Order extends WP_UnitTestCase {

	/**
	 * Reset the global $wp_styles instance before each test so registrations
	 * made by one test don't leak into another.
	 * 各テストの前に $wp_styles をリセットし、テスト間で登録内容が
	 * 引き継がれないようにする.
	 */
	public function set_up() {
		parent::set_up();
		global $wp_styles;
		$wp_styles = new WP_Styles(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	}

	/**
	 * Tear down: reset $wp_styles again to avoid leaking into later test files.
	 * $wp_styles を再度リセットし、他のテストファイルへの影響を防ぐ.
	 */
	public function tear_down() {
		global $wp_styles;
		$wp_styles = new WP_Styles(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		parent::tear_down();
	}

	/**
	 * Test that wp-block-library is added as a dependency of global-styles
	 * when both handles are registered.
	 * 両方のハンドルが登録されている場合に、global-styles の依存関係へ
	 * wp-block-library が追加されることをテストします.
	 */
	public function test_adds_wp_block_library_as_dependency_of_global_styles() {
		// Register both style handles the way WordPress core does.
		// WordPress core と同様の形でハンドルを登録.
		wp_register_style( 'wp-block-library', false );
		wp_register_style( 'global-styles', false );

		xt9_fix_global_styles_print_order();

		$global_styles = wp_styles()->registered['global-styles'];
		$this->assertContains( 'wp-block-library', $global_styles->deps, 'wp-block-library が global-styles の依存関係に追加されていない' );
	}

	/**
	 * Test that running the function twice does not add the dependency twice (idempotency).
	 * 2回実行しても依存関係が重複追加されないことをテストします（冪等性）.
	 */
	public function test_is_idempotent_when_run_twice() {
		wp_register_style( 'wp-block-library', false );
		wp_register_style( 'global-styles', false );

		xt9_fix_global_styles_print_order();
		xt9_fix_global_styles_print_order();

		$global_styles = wp_styles()->registered['global-styles'];
		$count         = count(
			array_filter(
				$global_styles->deps,
				static function ( $dep ) {
					return 'wp-block-library' === $dep;
				}
			)
		);
		$this->assertSame( 1, $count, 'wp-block-library が重複して追加されている' );
	}

	/**
	 * Test that nothing happens (no error, no changes) when global-styles is not registered,
	 * e.g. on a classic theme where this handle may not exist.
	 * global-styles が未登録の場合（クラシックテーマ等でハンドルが存在しないケース）
	 * に、エラーも変更も発生しないことをテストします.
	 */
	public function test_does_nothing_when_global_styles_is_not_registered() {
		wp_register_style( 'wp-block-library', false );
		// global-styles is intentionally left unregistered.
		// global-styles は意図的に未登録の状態にする.

		xt9_fix_global_styles_print_order();

		$this->assertArrayNotHasKey( 'global-styles', wp_styles()->registered, '未登録のはずの global-styles が登録されてしまっている' );
	}

	/**
	 * Test that nothing happens when wp-block-library is not registered.
	 * wp-block-library が未登録の場合に、global-styles の依存関係が
	 * 変更されないことをテストします.
	 */
	public function test_does_nothing_when_wp_block_library_is_not_registered() {
		wp_register_style( 'global-styles', false );
		// wp-block-library is intentionally left unregistered.
		// wp-block-library は意図的に未登録の状態にする.

		xt9_fix_global_styles_print_order();

		$global_styles = wp_styles()->registered['global-styles'];
		$this->assertNotContains( 'wp-block-library', $global_styles->deps, '未登録のはずの wp-block-library が依存関係に追加されてしまっている' );
	}
}
