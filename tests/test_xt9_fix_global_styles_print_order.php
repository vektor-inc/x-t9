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
	 * Test xt9_fix_global_styles_print_order() across the full set of registration /
	 * enqueue / dequeue conditions it needs to handle.
	 *
	 * Each case's starting state is expressed as a data-driven `setup` list of
	 * register / enqueue / dequeue actions (rather than one bespoke test method per
	 * condition), per testing/phpunit.md's "条件と期待値をセットで配列に入れてループ
	 * しながら処理する" convention. Because more than one aspect of the resulting
	 * state can matter for a given case (global-styles registration state, its deps,
	 * and the final print queue), each case declares only the `expected_*` keys that
	 * are relevant to it; keys that are omitted are simply not asserted.
	 *
	 * xt9_fix_global_styles_print_order() が扱う登録・enqueue・dequeue の
	 * 各条件を網羅的にテストします。
	 *
	 * 条件ごとに個別のテストメソッドを用意するのではなく、各ケースの開始状態を
	 * register / enqueue / dequeue の操作列（`setup`）としてデータ化し、
	 * testing/phpunit.md の「条件と期待値をセットで配列に入れてループしながら
	 * 処理する」規約に沿ってループ実行します。ケースによって確認すべき観点
	 * （ global-styles の登録状態・その deps・最終的な print queue ）が異なるため、
	 * 各ケースはそのケースに関係する `expected_*` キーのみを宣言し、
	 * 宣言されていないキーは検証をスキップします.
	 */
	public function test_xt9_fix_global_styles_print_order() {
		global $wp_styles;

		$test_cases = array(
			array(
				'test_condition_name'    => 'wp-block-library が直接 enqueue されている場合 => global-styles の依存関係に追加される',
				'setup'                  => array(
					array( 'action' => 'register', 'handle' => 'wp-block-library' ),
					array( 'action' => 'enqueue', 'handle' => 'wp-block-library' ),
					array( 'action' => 'register', 'handle' => 'global-styles' ),
				),
				'run_twice'              => false,
				'expected_deps_contains' => true,
			),
			array(
				'test_condition_name'    => '他の enqueue 済みハンドル経由で wp-block-library が間接的に読み込まれる場合 => global-styles の依存関係に追加される',
				'setup'                  => array(
					array( 'action' => 'register', 'handle' => 'wp-block-library' ),
					// Some other handle depends on wp-block-library and is the one actually enqueued.
					// 他のハンドルが wp-block-library に依存し、そのハンドル自体が enqueue される.
					array(
						'action' => 'register',
						'handle' => 'some-other-enqueued-style',
						'deps'   => array( 'wp-block-library' ),
					),
					array( 'action' => 'enqueue', 'handle' => 'some-other-enqueued-style' ),
					array( 'action' => 'register', 'handle' => 'global-styles' ),
				),
				'run_twice'              => false,
				'expected_deps_contains' => true,
			),
			array(
				'test_condition_name'    => '2回実行した場合 => 依存関係が重複追加されない（冪等性）',
				'setup'                  => array(
					array( 'action' => 'register', 'handle' => 'wp-block-library' ),
					array( 'action' => 'enqueue', 'handle' => 'wp-block-library' ),
					array( 'action' => 'register', 'handle' => 'global-styles' ),
				),
				'run_twice'              => true,
				'expected_deps_contains' => true,
				'expected_deps_count'    => 1,
			),
			array(
				'test_condition_name'                => 'global-styles が未登録の場合（クラシックテーマ等） => エラーも変更も発生せず、global-styles は登録されないまま',
				'setup'                              => array(
					array( 'action' => 'register', 'handle' => 'wp-block-library' ),
					array( 'action' => 'enqueue', 'handle' => 'wp-block-library' ),
					// global-styles is intentionally left unregistered.
					// global-styles は意図的に未登録の状態にする.
				),
				'run_twice'                          => false,
				'expected_global_styles_registered'  => false,
			),
			array(
				'test_condition_name'    => 'wp-block-library が未登録の場合 => global-styles の依存関係に追加されない',
				'setup'                  => array(
					array( 'action' => 'register', 'handle' => 'global-styles' ),
					// wp-block-library is intentionally left unregistered.
					// wp-block-library は意図的に未登録の状態にする.
				),
				'run_twice'              => false,
				'expected_deps_contains' => false,
			),
			array(
				// Regression case for a side effect flagged in code review: if a plugin or
				// child theme intentionally calls wp_dequeue_style( 'wp-block-library' ) for
				// performance reasons, this function must not add it as a dependency of
				// global-styles, because WP_Dependencies::do_items() would then force
				// wp-block-library to print anyway (dependencies are pulled in as long as
				// they are *registered*, regardless of whether they were themselves
				// enqueued). Doing so would silently defeat the dequeue and reload
				// wp-block-library on every page.
				// コードレビューで指摘された副作用の再現防止ケース。パフォーマンス目的で
				// プラグインや子テーマが wp_dequeue_style( 'wp-block-library' ) を
				// 呼んでいる場合、この関数はそれを wp-block-library への依存関係として
				// 追加してはいけません。WP_Dependencies::do_items() は「登録されている
				// だけ」の依存を出力対象へ引き込んでしまうため、依存関係を追加すると
				// dequeue が無効化され、全ページで wp-block-library が
				// 強制的に再ロードされてしまいます.
				'test_condition_name'     => '第三者プラグイン等が wp-block-library を dequeue している場合 => 依存関係に追加されず、キューにも復活しない（強制ロードされない）',
				'setup'                   => array(
					array( 'action' => 'register', 'handle' => 'wp-block-library' ),
					array( 'action' => 'enqueue', 'handle' => 'wp-block-library' ),
					array( 'action' => 'register', 'handle' => 'global-styles' ),
					array( 'action' => 'enqueue', 'handle' => 'global-styles' ),
					// Simulate a third-party plugin/child theme dequeuing wp-block-library.
					// サードパーティのプラグイン・子テーマによる dequeue を再現する.
					array( 'action' => 'dequeue', 'handle' => 'wp-block-library' ),
				),
				'run_twice'               => false,
				'expected_deps_contains'  => false,
				'expected_queue_contains' => false,
			),
		);

		foreach ( $test_cases as $case ) {
			// Reset the styles registry before every case so cases don't leak into each other.
			// ケース間で状態が引き継がれないよう、各ケースの前に styles レジストリをリセットする.
			$wp_styles = new WP_Styles(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

			// Replay this case's setup actions (register / enqueue / dequeue) to build its starting state.
			// このケースの開始状態を register / enqueue / dequeue の操作列で再現する.
			foreach ( $case['setup'] as $step ) {
				switch ( $step['action'] ) {
					case 'register':
						wp_register_style( $step['handle'], false, $step['deps'] ?? array() );
						break;
					case 'enqueue':
						wp_enqueue_style( $step['handle'] );
						break;
					case 'dequeue':
						wp_dequeue_style( $step['handle'] );
						break;
				}
			}

			// Execute the function under test, twice when this case tests idempotency.
			// テスト対象の関数を実行する（冪等性を確認するケースでは2回実行する）.
			xt9_fix_global_styles_print_order();
			if ( ! empty( $case['run_twice'] ) ) {
				xt9_fix_global_styles_print_order();
			}

			// Only assert global-styles' registration state when this case cares about it.
			// このケースが対象としている場合のみ global-styles の登録状態を確認する.
			if ( array_key_exists( 'expected_global_styles_registered', $case ) ) {
				$this->assertSame(
					$case['expected_global_styles_registered'],
					(bool) $wp_styles->query( 'global-styles', 'registered' ),
					$case['test_condition_name']
				);
			}

			// Only inspect global-styles->deps when the handle is expected to exist in this case.
			// global-styles ハンドルが存在するケースに限り deps を確認する.
			if ( array_key_exists( 'expected_deps_contains', $case ) || array_key_exists( 'expected_deps_count', $case ) ) {
				$global_styles = $wp_styles->registered['global-styles'];

				if ( array_key_exists( 'expected_deps_contains', $case ) ) {
					if ( $case['expected_deps_contains'] ) {
						$this->assertContains( 'wp-block-library', $global_styles->deps, $case['test_condition_name'] );
					} else {
						$this->assertNotContains( 'wp-block-library', $global_styles->deps, $case['test_condition_name'] );
					}
				}

				if ( array_key_exists( 'expected_deps_count', $case ) ) {
					$count = count(
						array_filter(
							$global_styles->deps,
							static function ( $dep ) {
								return 'wp-block-library' === $dep;
							}
						)
					);
					$this->assertSame( $case['expected_deps_count'], $count, $case['test_condition_name'] );
				}
			}

			// Only assert the final print queue when this case cares about it (the dequeue regression case).
			// このケースが対象としている場合のみ（ dequeue の回帰ケース）最終的な print queue を確認する.
			if ( array_key_exists( 'expected_queue_contains', $case ) ) {
				if ( $case['expected_queue_contains'] ) {
					$this->assertContains( 'wp-block-library', $wp_styles->queue, $case['test_condition_name'] );
				} else {
					$this->assertNotContains( 'wp-block-library', $wp_styles->queue, $case['test_condition_name'] );
				}
			}
		}
	}
}
