<?php
/**
 * PHPUnit bootstrap file for x-t9 theme.
 */

// Load Composer autoloader (includes PHPUnit Polyfills).
require_once dirname( dirname( __FILE__ ) ) . '/vendor/autoload.php';

// Determine the tests directory (from a WP dev checkout).
// Try the WP_TESTS_DIR environment variable first.
$_tests_dir = getenv( 'WP_TESTS_DIR' );

// Next, try the WP_PHPUNIT composer package.
if ( ! $_tests_dir ) {
	$_tests_dir = getenv( 'WP_PHPUNIT__DIR' );
}

// See if we're installed inside an existing WP dev instance.
if ( ! $_tests_dir ) {
	$_try_tests_dir = dirname( __FILE__ ) . '/../../../../tests/phpunit';
	if ( file_exists( $_try_tests_dir . '/includes/functions.php' ) ) {
		$_tests_dir = $_try_tests_dir;
	}
}

// Fallback.
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Set the active theme to x-t9 so that get_template_directory() returns the correct path.
 * WordPress will then load the theme's functions.php automatically.
 */
tests_add_filter( 'stylesheet', function() { return 'x-t9'; } );
tests_add_filter( 'template', function() { return 'x-t9'; } );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
