<?php
/**
 * Tests for xt9_get_the_archive_title() function.
 *
 * @package x-t9
 */

/**
 * Class Test_Xt9_Get_The_Archive_Title
 */
class Test_Xt9_Get_The_Archive_Title extends WP_UnitTestCase {

	/**
	 * Test xt9_get_the_archive_title().
	 *
	 * カテゴリー・タグ・著者アーカイブの各ケースをテストします。
	 */
	public function test_xt9_get_the_archive_title() {

		// カテゴリーを作成.
		$cat_id = $this->factory->category->create(
			array(
				'name' => 'テストカテゴリー',
				'slug' => 'test-category',
			)
		);

		// タグを作成.
		$tag_id = $this->factory->tag->create(
			array(
				'name' => 'テストタグ',
				'slug' => 'test-tag',
			)
		);

		// 投稿者を作成.
		$author_id = $this->factory->user->create(
			array(
				'display_name' => 'テスト著者',
			)
		);

		$test_cases = array(
			// 正常系: カテゴリーアーカイブ.
			array(
				'test_condition_name' => 'カテゴリーアーカイブの場合 => カテゴリー名が返る',
				'target_url'          => get_category_link( $cat_id ),
				'expected'            => 'テストカテゴリー',
			),
			// 正常系: タグアーカイブ.
			array(
				'test_condition_name' => 'タグアーカイブの場合 => タグ名が返る',
				'target_url'          => get_tag_link( $tag_id ),
				'expected'            => 'テストタグ',
			),
			// 正常系: 著者アーカイブ.
			array(
				'test_condition_name' => '著者アーカイブの場合 => 著者の表示名が返る',
				'target_url'          => get_author_posts_url( $author_id ),
				'expected'            => 'テスト著者',
			),
		);

		foreach ( $test_cases as $case ) {
			$this->go_to( $case['target_url'] );

			$actual = xt9_get_the_archive_title();

			$this->assertEquals( $case['expected'], $actual, $case['test_condition_name'] );
		}
	}

	/**
	 * Test xt9_get_the_archive_title() with page_for_posts option.
	 *
	 * ブログトップページ（is_home() && !is_front_page()）のケースをテストします。
	 * show_on_front = 'page' に設定し、フロントページ用固定ページを指定することで
	 * is_home() と is_front_page() が別々になる状態を再現します。
	 */
	public function test_xt9_get_the_archive_title_with_page_for_posts() {

		// フロントページ用固定ページを作成.
		$front_page_id = $this->factory->post->create(
			array(
				'post_type'   => 'page',
				'post_title'  => 'フロントページ',
				'post_status' => 'publish',
			)
		);

		// ブログトップページ用固定ページを作成.
		$blog_page_id = $this->factory->post->create(
			array(
				'post_type'   => 'page',
				'post_title'  => 'ブログ一覧ページ',
				'post_status' => 'publish',
			)
		);

		// show_on_front = 'page' に設定して、フロントページと投稿ページを分離する.
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id );

		$test_cases = array(
			// 正常系: ブログトップページで page_for_posts が設定されている場合.
			array(
				'test_condition_name' => 'ブログトップページで page_for_posts が設定されている場合 => 固定ページのタイトルが返る',
				'page_for_posts'      => $blog_page_id,
				'expected'            => 'ブログ一覧ページ',
			),
			// 異常系: ブログトップページで page_for_posts に存在しないIDが設定されている場合.
			array(
				'test_condition_name' => 'ブログトップページで page_for_posts に存在しないIDが設定されている場合 => 空文字が返る',
				'page_for_posts'      => 99999,
				'expected'            => '',
			),
		);

		foreach ( $test_cases as $case ) {
			update_option( 'page_for_posts', $case['page_for_posts'] );

			// ブログトップページのURLに移動することで is_home() = true, is_front_page() = false になる.
			$this->go_to( get_option( 'home' ) . '/?page_id=' . $case['page_for_posts'] );

			// クエリフラグを直接設定して is_home() && !is_front_page() の状態を再現.
			global $wp_query;
			$wp_query->is_home = true;

			$actual = xt9_get_the_archive_title();

			delete_option( 'page_for_posts' );
			$wp_query->is_home = false;

			$this->assertEquals( $case['expected'], $actual, $case['test_condition_name'] );
		}

		// クリーンアップ.
		update_option( 'show_on_front', 'posts' );
		delete_option( 'page_on_front' );
	}
}
