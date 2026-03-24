<?php
/**
 * Tests for xt9_get_the_archive_title() function.
 * xt9_get_the_archive_title() 関数のテスト。
 *
 * @package x-t9
 */

/**
 * Class Test_Xt9_Get_The_Archive_Title
 */
class Test_Xt9_Get_The_Archive_Title extends WP_UnitTestCase {

	/**
	 * Store original option values before each test.
	 * 各テスト前に元のオプション値を保存する.
	 *
	 * @var array
	 */
	private $original_options = array();

	/**
	 * Set up test fixtures.
	 * テストフィクスチャのセットアップ.
	 */
	public function set_up() {
		parent::set_up();

		// Save original option values for later restoration.
		// 後で復元するために元のオプション値を保存.
		$this->original_options = array(
			'show_on_front'  => get_option( 'show_on_front' ),
			'page_on_front'  => get_option( 'page_on_front' ),
			'page_for_posts' => get_option( 'page_for_posts' ),
		);
	}

	/**
	 * Tear down test fixtures.
	 * テストフィクスチャのクリーンアップ.
	 */
	public function tear_down() {
		// Restore original option values to avoid cross-test leakage.
		// テスト間の副作用を防ぐため元のオプション値を復元.
		foreach ( $this->original_options as $key => $value ) {
			if ( false === $value ) {
				delete_option( $key );
			} else {
				update_option( $key, $value );
			}
		}

		parent::tear_down();
	}

	/**
	 * Test xt9_get_the_archive_title() for category, tag, and author archives.
	 * カテゴリー・タグ・著者アーカイブの各ケースをテストします。
	 */
	public function test_xt9_get_the_archive_title() {

		// Create a test category. / テスト用カテゴリーを作成.
		$cat_id = $this->factory->category->create(
			array(
				'name' => 'テストカテゴリー',
				'slug' => 'test-category',
			)
		);

		// Create a test tag. / テスト用タグを作成.
		$tag_id = $this->factory->tag->create(
			array(
				'name' => 'テストタグ',
				'slug' => 'test-tag',
			)
		);

		// Create a test author. / テスト用投稿者を作成.
		$author_id = $this->factory->user->create(
			array(
				'display_name' => 'テスト著者',
			)
		);

		$test_cases = array(
			// Normal case: category archive. / 正常系: カテゴリーアーカイブ.
			array(
				'test_condition_name' => 'カテゴリーアーカイブの場合 => カテゴリー名が返る',
				'target_url'          => get_category_link( $cat_id ),
				'expected'            => 'テストカテゴリー',
			),
			// Normal case: tag archive. / 正常系: タグアーカイブ.
			array(
				'test_condition_name' => 'タグアーカイブの場合 => タグ名が返る',
				'target_url'          => get_tag_link( $tag_id ),
				'expected'            => 'テストタグ',
			),
			// Normal case: author archive. / 正常系: 著者アーカイブ.
			array(
				'test_condition_name' => '著者アーカイブの場合 => 著者の表示名が返る',
				'target_url'          => get_author_posts_url( $author_id ),
				'expected'            => 'テスト著者',
			),
		);

		foreach ( $test_cases as $case ) {
			// Navigate to the target URL. / テスト対象 URL に移動.
			$this->go_to( $case['target_url'] );

			// Execute the function under test. / テスト関数を実行.
			$actual = xt9_get_the_archive_title();

			// Assert the expected value. / 期待値をアサート.
			$this->assertEquals( $case['expected'], $actual, $case['test_condition_name'] );
		}
	}

	/**
	 * Test xt9_get_the_archive_title() when the blog top page (is_home()) is active.
	 * ブログトップページ（is_home() && !is_front_page()）のケースをテストします。
	 *
	 * Sets show_on_front to 'page' and assigns a static front page so that
	 * is_home() returns true and is_front_page() returns false.
	 * show_on_front = 'page' に設定し、フロントページ用固定ページを指定することで
	 * is_home() が true、is_front_page() が false になる状態を再現します。
	 */
	public function test_xt9_get_the_archive_title_with_page_for_posts() {

		// Create a static front page. / フロントページ用固定ページを作成.
		$front_page_id = $this->factory->post->create(
			array(
				'post_type'   => 'page',
				'post_title'  => 'フロントページ',
				'post_status' => 'publish',
			)
		);

		// Create a blog top page. / ブログトップページ用固定ページを作成.
		$blog_page_id = $this->factory->post->create(
			array(
				'post_type'   => 'page',
				'post_title'  => 'ブログ一覧ページ',
				'post_status' => 'publish',
			)
		);

		// Configure front page settings so that is_home() and is_front_page() differ.
		// is_home() と is_front_page() が別々になるようフロントページ設定を構成.
		// With show_on_front = 'page', is_front_page() checks is_page( page_on_front )
		// instead of is_home(), so setting is_home = true won't trigger is_front_page().
		// show_on_front = 'page' の場合、is_front_page() は is_page( page_on_front ) を
		// チェックするため、is_home = true でも is_front_page() は false になる.
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id );

		$test_cases = array(
			// Normal case: blog top page with page_for_posts set. / 正常系: page_for_posts が設定されている場合.
			array(
				'test_condition_name' => 'ブログトップページで page_for_posts が設定されている場合 => 固定ページのタイトルが返る',
				'page_for_posts'      => $blog_page_id,
				'expected'            => 'ブログ一覧ページ',
			),
			// Edge case: page_for_posts set to a non-existent post ID. / 異常系: 存在しない投稿 ID が設定されている場合.
			array(
				'test_condition_name' => 'ブログトップページで page_for_posts に存在しないIDが設定されている場合 => 空文字が返る',
				'page_for_posts'      => 99999,
				'expected'            => '',
			),
		);

		foreach ( $test_cases as $case ) {
			// Set the page_for_posts option. / page_for_posts オプションを設定.
			update_option( 'page_for_posts', $case['page_for_posts'] );

			// Save original query flags before mutating to enable safe restoration.
			// 変更前のクエリフラグを退避して安全に復元できるようにする.
			global $wp_query;
			$original_is_home = $wp_query->is_home;
			$original_is_page = $wp_query->is_page;

			// Set is_home = true and is_page = true to simulate the blog top page state.
			// is_page = true ensures is_front_page() checks is_page( page_on_front ), not is_home(),
			// which guarantees is_front_page() returns false for this request.
			// ブログトップページの状態を再現するため is_home を true に設定.
			// is_page = true により is_front_page() が is_page( page_on_front ) で判定され、
			// このリクエストでは is_front_page() が false になることを保証する.
			$wp_query->is_home = true;
			$wp_query->is_page = true;

			// Execute the function under test. / テスト関数を実行.
			$actual = xt9_get_the_archive_title();

			// Restore original query flags. / クエリフラグを元の値に復元.
			$wp_query->is_home = $original_is_home;
			$wp_query->is_page = $original_is_page;

			// Clean up page_for_posts option (show_on_front/page_on_front restored by tearDown).
			// page_for_posts オプションをクリーンアップ（show_on_front/page_on_front は tearDown で復元）.
			delete_option( 'page_for_posts' );

			// Assert the expected value. / 期待値をアサート.
			$this->assertEquals( $case['expected'], $actual, $case['test_condition_name'] );
		}
	}
}
