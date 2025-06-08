<?php
/**
 * X-T9 functions
 *
 * @package vektor-inc/x-t9
 */

// Composer autoload.
require_once __DIR__ . '/vendor/autoload.php';

$theme_opt = wp_get_theme( get_template() );

define( 'XT9_THEME_VERSION', $theme_opt->Version ); // phpcs:ignore

if ( ! function_exists( 'xt9_support' ) ) :
	function xt9_support() {

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/style.css' );

		$wp_version = get_bloginfo( 'version' );
		if ( version_compare( $wp_version, '6.6', '>=' ) ) {
			// WordPress over 6.6
			add_editor_style( 'assets/css/editor.css' );
		} else {
			// WordPress under 6.5
			add_editor_style( 'assets/css/editor-wp65.css' );
		}
	}
	add_action( 'after_setup_theme', 'xt9_support' );
endif;

/**
 * Enqueue scripts and styles.
 */
function xt9_scripts() {
	// Enqueue theme stylesheet.
	wp_enqueue_style( 'x-t9-style', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'xt9_scripts' );

/**
 * Load JavaScript
 *
 * @return void
 */
function xt9_add_script() {
	wp_register_script( 'xt9-js', get_template_directory_uri() . '/assets/js/main.js', array(), XT9_THEME_VERSION, true );
	$options = array(
		'header_scrool' => true,
	);
	wp_localize_script( 'xt9-js', 'xt9Opt', apply_filters( 'xt9_localize_options', $options ) );
	wp_enqueue_script( 'xt9-js' );
}
add_action( 'wp_enqueue_scripts', 'xt9_add_script' );

// Add block patterns.
require get_template_directory() . '/inc/block-patterns.php';
// Add Block Styles.
require get_template_directory() . '/inc/block-styles.php';
// Load TGM.
require get_template_directory() . '/inc/tgm-plugin-activation/tgm-config.php';

/**
 * Archive title
 *
 * @return string archive title
 */
function xt9_get_the_archive_title() {
	$title = '';
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_year() ) {
		$title = get_the_date( _x( 'Y', 'yearly archives date format', 'x-t9' ) );
	} elseif ( is_month() ) {
		$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'x-t9' ) );
	} elseif ( is_day() ) {
		$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'x-t9' ) );
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
		if ( ! empty( $wp_query->query_vars['post_type'] ) ) {
			$post_type = $wp_query->query_vars['post_type'];
			$title     = get_post_type_object( $post_type )->labels->name;
		} else {
			$title = __( 'Archives', 'x-t9' );
		}
	}
	return apply_filters( 'xt9_get_the_archive_title', $title );
}
add_filter( 'get_the_archive_title', 'xt9_get_the_archive_title' );

/**
 * Year Artchive list 'year' and count insert to inner </a>
 *
 * @param string $html link html.
 * @return string $html added string html
 */
function xt9_archives_link( $html ) {
	return preg_replace( '@</a>(.+?)</li>@', '\1</a></li>', $html );
}
add_filter( 'get_archives_link', 'xt9_archives_link' );

/**
 * Category list count insert to inner </a>
 *
 * @param string $output : output html.
 * @param array  $args : list categories args.
 * @return string $output : return string
 */
function xt9_list_categories( $output, $args ) {
	$output = preg_replace( '/<\/a>\s*\((\d+)\)/', ' ($1)</a>', $output );
	return $output;
}
add_filter( 'wp_list_categories', 'xt9_list_categories', 10, 2 );

// WooCommerce が有効な場合のみ WooCommerce 用の CSS を読み込む
function x_t9_enqueue_woocommerce_css() {
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'x-t9-woo-style', get_template_directory_uri() . '/plugin-support/woocommerce/css/woo.css', array( 'x-t9-style' ), '1.0.0' );    }
}
add_action( 'wp_enqueue_scripts', 'x_t9_enqueue_woocommerce_css' );

/**
 * Navigation Submenu block do render menu item description
 * 6.8がリリースされたら削除する
 */
// Navigation Link ブロックとは異なり、Navigation Submenu ブロックはメニュー項目の説明 HTML をレンダリングしないため追加。
// Navigation Submenu block does not render menu item description #52505
function xt9_add_description_to_navigation_items( $block_content, $block ) {
	if ( 'core/navigation-submenu' === $block['blockName'] && ! empty( $block['attrs']['description'] ) ) {
		$description = esc_attr( $block['attrs']['description'] );
		// 説明用のspanタグを作成
		$description_span = '<span class="wp-block-navigation-item__description">' . $description . '</span>';
		// aタグ内の最後に説明を挿入
		// 正規表現を用いて、aタグの終了直前に挿入
		$block_content = preg_replace( '/<\/a>/', $description_span . '</a>', $block_content, 1 );
	}
	return $block_content;
}
$version = get_bloginfo('version');
if ( version_compare( preg_replace('/[^0-9.]/', '', $version), '6.8', '<' ) ) {
	// 6.8 未満で実行（ 6.8 RC版やBeta版も除外 ）
	// Run with a version earlier than 6.8 (excluding 6.8 RC and Beta versions)
    add_filter( 'render_block', 'xt9_add_description_to_navigation_items', 10, 2 );
}

/**
 * Add body class for post name, category ID, tag ID, and custom taxonomy ID.
 * @param string $html class Array.
 */
function veu_add_body_class( $class ) {
	if ( is_singular() ) {
		global $post;
		if ( $post->post_name ) {
			$class[] = 'post-name-' . esc_attr( $post->post_name );
		}

		// カテゴリーIDを追加
		$categories = get_the_category( $post->ID );
		if ( $categories && ! is_wp_error( $categories ) ) {
			foreach ( $categories as $category ) {
				$class[] = 'category-id-' . $category->term_id;
			}
		}

		// タグIDを追加
		$tags = get_the_tags( $post->ID );
		if ( $tags && ! is_wp_error( $tags ) ) {
			foreach ( $tags as $tag ) {
				$class[] = 'tag-id-' . $tag->term_id;
			}
		}

		// カスタムタクソノミーIDを追加
		$taxonomies = get_object_taxonomies( get_post_type( $post ), 'objects' );
		foreach ( $taxonomies as $taxonomy ) {
			// カテゴリー・タグ以外のタクソノミーのみ対象にする
			if ( in_array( $taxonomy->name, ['category', 'post_tag'] ) ) {
				continue;
			}
			$terms = wp_get_post_terms( $post->ID, $taxonomy->name );
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$class[] = $taxonomy->name . '-id-' . $term->term_id;
				}
			}
		}
	}

	if ( is_archive() || is_singular() || ( is_home() && ! is_front_page() ) ) {
		if ( function_exists( 'vk_get_post_type' ) ) {
			$post_type_info = vk_get_post_type();
			if ( ! empty( $post_type_info['slug'] ) ) {
				$class[] = 'post-type-' . $post_type_info['slug'];
			}
		}
	}
	return $class;
}
add_filter( 'body_class', 'veu_add_body_class' );