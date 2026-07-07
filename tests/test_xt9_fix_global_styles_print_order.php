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
	 * when both handles are registered and wp-block-library is enqueued.
	 * 両方のハンドルが登録され、wp-block-library が enqueue されている場合に、
	 * global-styles の依存関係へ wp-block-library が追加されることをテストします.
	 */
	public function test_adds_wp_block_library_as_dependency_when_enqueued() {
		// Register both style handles the way WordPress core does, and enqueue
		// wp-block-library the way wp_common_block_scripts_and_styles() does.
		// WordPress core と同様の形でハンドルを登録し、
		// wp_common_block_scripts_and_styles() と同様に wp-block-library を enqueue する.
		wp_register_style( 'wp-block-library', false );
		wp_enqueue_style( 'wp-block-library' );
		wp_register_style( 'global-styles', false );

		xt9_fix_global_styles_print_order();

		$global_styles = wp_styles()->registered['global-styles'];
		$this->assertContains( 'wp-block-library', $global_styles->deps, 'wp-block-library が global-styles の依存関係に追加されていない' );
	}

	/**
	 * Test that wp-block-library is also recognized as "going to be printed anyway"
	 * when it is only pulled in indirectly via another enqueued handle's dependency
	 * chain (WP_Dependencies::query( $handle, 'enqueued' ) resolves this recursively),
	 * and the dependency is still added in that case.
	 * wp-block-library が直接 enqueue されておらず、他の enqueue 済みハンドルの
	 * 依存関係経由で間接的に読み込まれる場合でも
	 * （ WP_Dependencies::query( $handle, 'enqueued' ) は再帰的に解決するため）
	 * 「どのみち出力される」と判定され、依存関係が追加されることをテストします.
	 */
	public function test_adds_dependency_when_wp_block_library_is_only_indirectly_enqueued() {
		wp_register_style( 'wp-block-library', false );
		// Some other handle depends on wp-block-library and is the one actually enqueued.
		// 他のハンドルが wp-block-library に依存し、そのハンドル自体が enqueue される.
		wp_register_style( 'some-other-enqueued-style', false, array( 'wp-block-library' ) );
		wp_enqueue_style( 'some-other-enqueued-style' );
		wp_register_style( 'global-styles', false );

		xt9_fix_global_styles_print_order();

		$global_styles = wp_styles()->registered['global-styles'];
		$this->assertContains( 'wp-block-library', $global_styles->deps, '間接的に読み込まれる wp-block-library が依存関係に追加されていない' );
	}

	/**
	 * Test that running the function twice does not add the dependency twice (idempotency).
	 * 2回実行しても依存関係が重複追加されないことをテストします（冪等性）.
	 */
	public function test_is_idempotent_when_run_twice() {
		wp_register_style( 'wp-block-library', false );
		wp_enqueue_style( 'wp-block-library' );
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
		wp_enqueue_style( 'wp-block-library' );
		// global-styles is intentionally left unregistered.
		// global-styles は意図的に未登録の状態にする.

		xt9_fix_global_styles_print_order();

		$this->assertArrayNotHasKey( 'global-styles', wp_styles()->registered, '未登録のはずの global-styles が登録されてしまっている' );
	}

	/**
	 * Test that nothing happens when wp-block-library is not registered at all.
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

	/**
	 * Regression test for a side effect flagged in code review: if a plugin or child
	 * theme intentionally calls wp_dequeue_style( 'wp-block-library' ) for performance
	 * reasons, this function must not add it as a dependency of global-styles, because
	 * WP_Dependencies::do_items() would then force wp-block-library to print anyway
	 * (dependencies are pulled in as long as they are *registered*, regardless of
	 * whether they were themselves enqueued). Doing so would silently defeat the
	 * dequeue and reload wp-block-library on every page.
	 * コードレビューで指摘された副作用の再現防止テストです。パフォーマンス目的で
	 * プラグインや子テーマが wp_dequeue_style( 'wp-block-library' ) を呼んでいる場合、
	 * この関数はそれを wp-block-library に依存関係を追加してはいけません。
	 * WP_Dependencies::do_items() は「登録されているだけ」の依存を出力対象へ
	 * 引き込んでしまうため、依存関係を追加すると dequeue が無効化され、
	 * 全ページで wp-block-library が強制的に再ロードされてしまいます。
	 */
	public function test_does_not_force_load_wp_block_library_when_dequeued() {
		wp_register_style( 'wp-block-library', false );
		wp_enqueue_style( 'wp-block-library' );
		wp_register_style( 'global-styles', false );
		wp_enqueue_style( 'global-styles' );

		// Simulate a third-party plugin/child theme dequeuing wp-block-library for
		// performance reasons, at some priority after our own hook would normally run.
		// パフォーマンス目的でサードパーティのプラグイン・子テーマが
		// wp-block-library を dequeue するケースを再現する.
		wp_dequeue_style( 'wp-block-library' );

		xt9_fix_global_styles_print_order();

		$global_styles = wp_styles()->registered['global-styles'];
		$this->assertNotContains(
			'wp-block-library',
			$global_styles->deps,
			'dequeue 済みの wp-block-library が global-styles の依存関係に追加され、強制ロードされてしまっている'
		);
		$this->assertNotContains(
			'wp-block-library',
			wp_styles()->queue,
			'dequeue 済みの wp-block-library がキューに復活してしまっている'
		);
	}
}
