<?php
/**
 * 生成先のテーマ・プラグインでブロックパターン情報を読み込んで登録
 *
 * @package VK Block Pattern Plugin Generator
 */

namespace wp_content\themes\x29\inc\patterns_data;

/**
 * 生成先のテーマ・プラグインでブロックパターン情報を読み込んで登録
 */
class Register_Patterns_From_Json {

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'init', array( __CLASS__, 'register_template' ) );
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'print_pattern_css' ) );
		add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'print_pattern_editor_css' ) );
	}

	/**
	 * CSSをファイルから読み込んで最小化して返す
	 *
	 * @param string $filename CSSのファイル名.
	 * @return string 最小化したCSSファイル
	 */
	public static function load_inline_css( $filename = 'style.css' ) {
		$style_path  = wp_normalize_path( dirname( __FILE__ ) . '/' . $filename );
		$style_url   = str_replace( wp_normalize_path( ABSPATH ), site_url() . '/', $style_path );
		$dynamic_css = '';
		if ( file_exists( $style_path ) ) {

			$dynamic_css = file_get_contents( $style_path );
			// delete before after space.
			$dynamic_css = trim( $dynamic_css );
			// convert tab and br to space.
			$dynamic_css = preg_replace( '/[\n\r\t]/', '', $dynamic_css );
			// Change multiple spaces to single space.
			$dynamic_css = preg_replace( '/\s(?=\s)/', '', $dynamic_css );
		}
		return $dynamic_css;
	}

	/**
	 * CSSを実際に出力
	 *
	 * @return void
	 */
	public static function print_pattern_css() {
		$css = self::load_inline_css();
		if ( $css ) {
			wp_add_inline_style( 'wp-block-library', $css );
		}
	}

	/**
	 * 編集画面用CSS出力
	 *
	 * @return void
	 */
	public static function print_pattern_editor_css() {
		$css  = self::load_inline_css();
		$css .= self::load_inline_css( 'style-editor.css' );
		if ( $css ) {
			wp_add_inline_style( 'wp-edit-blocks', $css );
		}
	}

	/**
	 * パターンを登録
	 *
	 * @return void
	 */
	public static function register_template() {

		// これは読み込み側では存在しないクラスなので要対応.
		$json_dir_path = wp_normalize_path( dirname( __FILE__ ) . '/' );

		if ( function_exists( 'register_block_pattern_category' ) && function_exists( 'register_block_pattern' ) ) {

			/*******************************
			/* import category
			/* --------------------------- */
			$category_json = $json_dir_path . 'category.json';

			if ( file_exists( $category_json ) ) {
				$json = file_get_contents( $category_json );
				if ( function_exists( 'mb_convert_encoding' ) ) {
					$json = mb_convert_encoding( $json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN' );
				}
				$obj = json_decode( $json, true );
				foreach ( $obj as $key => $val ) {
					// Block Category.
					register_block_pattern_category(
						$val['slug'],
						array( 'label' => esc_html( $val['name'] ) )
					);
				}
			}

			/*******************************
			/* import Language
			/* --------------------------- */
			$language_json = $json_dir_path . 'term-language.json';

			if ( file_exists( $language_json ) ) {
				$json = file_get_contents( $language_json );
				if ( function_exists( 'mb_convert_encoding' ) ) {
					$json = mb_convert_encoding( $json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN' );
				}
				$obj       = json_decode( $json, true );
				$languages = array();
				foreach ( $obj as $key => $val ) {
					$languages[] = $val['slug'];
				}
			}

			// タームのスラッグが小文字に変換されてしまうため小文字.
			$site_lang = mb_strtolower( get_locale() );

			// 表示中のサイトの言語が言語カテゴリーに含まれている場合.
			if ( in_array( $site_lang, (array) $languages, true ) ) {
				// 表示中の言語に合致したパターンのみ登録するモード.
				$judge_lang_mode = true;
			} else {
				// 英語のパターンのみ登録するモード.
				$judge_lang_mode = false;
			}

			/*******************************
			/* import posts
			/* --------------------------- */
			$active_plugins = get_option( 'active_plugins', array() );
			if ( in_array( 'vk-blocks/vk-blocks.php', (array) $active_plugins, true ) ) {
				$filename = 'template-for-vk-free.json';
			} elseif ( in_array( 'vk-blocks-pro/vk-blocks.php', (array) $active_plugins, true ) ) {
				$filename = 'template-for-vk-pro.json';
			} else {
				$filename = 'template-exclude-vk.json';
			}

			$json_url = $json_dir_path . $filename;

			if ( file_exists( $json_url ) ) {
				$json = file_get_contents( $json_url );
				if ( function_exists( 'mb_convert_encoding' ) ) {
					$json = mb_convert_encoding( $json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN' );
				}
				$obj = json_decode( $json, true );

				$image_dir_path = $json_dir_path . 'images/';
				$image_dir_uri  = str_replace( wp_normalize_path( ABSPATH ), site_url() . '/', $image_dir_path );

				foreach ( $obj as $key => $val ) {

					// 本文欄の /// エスケープを戻す.
					$val = wp_unslash( $val );

					$val['content'] = str_replace( '[pattern_directory]', $image_dir_uri, $val['content'] );

					$langs = $val['languages'];

					// 表示中の言語に合致したパターンのみ登録するモード.
					if ( $judge_lang_mode ) {
						if ( in_array( $site_lang, (array) $val['languages'], true ) ) {
							// 本来 $val['post_status'] は必ず必ず入ってくる。リリース前のデータ対応なので2021年3月以降削除可.
							if ( ! isset( $val['post_status'] ) || 'publish' === $val['post_status'] ) {
								register_block_pattern(
									$val['post_name'],
									array(
										'title'      => $val['title'],
										'categories' => $val['categories'],
										'content'    => $val['content'],
										'blockTypes' => $val['blockTypes'],
									)
								);
							}
						}
					} else {
						// 英語のパターンのみ登録するモード.
						if ( in_array( mb_strtolower( 'en_US' ), (array) $val['languages'], true ) ) {
							if ( ! isset( $val['post_status'] ) || 'publish' === $val['post_status'] ) {
								register_block_pattern(
									$val['post_name'],
									array(
										'title'      => $val['title'],
										'categories' => $val['categories'],
										'content'    => $val['content'],
										'blockTypes' => $val['blockTypes'],
									)
								);
							}
						}
					}
				}
			} else {
				echo 'データがありません';
			}
		}
	}
}

new Register_Patterns_From_Json();
