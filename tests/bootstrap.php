<?php
/**
 * PHPUnit bootstrap file for x-t9 theme.
 * x-t9 テーマ用 PHPUnit ブートストラップファイル。
 */

// Load Composer autoloader (includes PHPUnit Polyfills).
// Composer オートローダーを読み込む（PHPUnit Polyfills を含む）.
require_once dirname( dirname( __FILE__ ) ) . '/vendor/autoload.php';

// Determine the tests directory (from a WP dev checkout).
// Try the WP_TESTS_DIR environment variable first.
// WP テストライブラリのディレクトリを取得する。まず環境変数を確認.
$_tests_dir = getenv( 'WP_TESTS_DIR' );

// Next, try the WP_PHPUNIT composer package.
// WP_PHPUNIT composer パッケージを確認.
if ( ! $_tests_dir ) {
	$_tests_dir = getenv( 'WP_PHPUNIT__DIR' );
}

// See if we're installed inside an existing WP dev instance.
// WP 開発環境の内部にインストールされているか確認.
if ( ! $_tests_dir ) {
	$_try_tests_dir = dirname( __FILE__ ) . '/../../../../tests/phpunit';
	if ( file_exists( $_try_tests_dir . '/includes/functions.php' ) ) {
		$_tests_dir = $_try_tests_dir;
	}
}

// Fallback. / フォールバック.
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
// tests_add_filter() 関数を使えるようにする.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Set the active theme to x-t9 so that get_template_directory() returns the correct path.
 * WordPress will then load the theme's functions.php automatically.
 * アクティブテーマを x-t9 に設定して get_template_directory() が正しいパスを返すようにする。
 * これにより WordPress がテーマの functions.php を自動的に読み込む。
 */
tests_add_filter( 'stylesheet', function() { return 'x-t9'; } );
tests_add_filter( 'template', function() { return 'x-t9'; } );

// Start up the WP testing environment.
// WP テスト環境を起動.
require $_tests_dir . '/includes/bootstrap.php';
