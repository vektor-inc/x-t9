<?php
/**
 * Undocumented function
 *
 * @package vektor-inc/x29
 */

if ( ! function_exists( 'x29_support' ) ) :
	function x29_support() {

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/style.css' );
		add_editor_style( 'assets/css/editor.css' );
	}
	add_action( 'after_setup_theme', 'x29_support' );
endif;

/**
 * Enqueue scripts and styles.
 */
function x29_scripts() {
	// Enqueue theme stylesheet.
	wp_enqueue_style( 'x29-style', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'x29_scripts' );

/**
 * Archive title
 *
 * @return string archive title
 */
function x29_get_the_archive_title() {
	$title = '';
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_year() ) {
		$title = get_the_date( _x( 'Y', 'yearly archives date format', 'x29' ) );
	} elseif ( is_month() ) {
		$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'x29' ) );
	} elseif ( is_day() ) {
		$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'x29' ) );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() && ! is_front_page() ) {
		// Get post top page by setting display page.
		$post_top_id = get_option( 'page_for_posts' );
		if ( $post_top_id ) {
			$title = get_the_title( $post_top_id );
		}
	} else {
		global $wp_query;
		// get post type.
		$post_type = $wp_query->query_vars['post_type'];
		if ( $post_type ) {
			$title = get_post_type_object( $post_type )->labels->name;
		} else {
			$title = __( 'Archives', 'x29' );
		}
	}
	return apply_filters( 'x29_get_the_archive_title', $title );
}
add_filter( 'get_the_archive_title', 'x29_get_the_archive_title' );

// Add block patterns.
require get_template_directory() . '/inc/block-patterns.php';
