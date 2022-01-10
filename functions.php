<?php

if ( ! function_exists( 'x29_support' ) ) :
	function x29_support() {

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/style.css' );
		add_editor_style( 'assets/css/editor-style.css' );
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

include( dirname( __FILE__ ) . '/inc/patterns-data/class-register-patterns-from-json.php' );
