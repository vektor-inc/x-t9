var gulp = require('gulp');

const replace = require('gulp-replace')

// 開発用の文字列を本番用（動的・翻訳対応の PHP）へ置換する定義。
// パターンは WordPress 標準の /patterns ディレクトリ配下に置かれ、各ファイルが独立した PHP として登録される。
// 開発時は localhost の URL や素のテキスト（日本語含む）でプレビューし、ビルド時にここで本番用へ変換する。

// 開発時に入力された日本語を英語へ変換する。
// 後続のラベル翻訳（>Read more</ → esc_html__）より前に実行する必要があるため先頭に置く。
const japaneseToEnglish = [
	[ '続きを読む', 'Read more' ],
	[ 'お知らせ', 'Information' ],
	[ 'カテゴリー', 'Category' ],
	[ '検索', 'Search' ],
	[ '投稿はありません。', 'No posts.' ],
	[ 'サービスの流れ', 'Service Flow' ],
	[ '投稿一覧', 'Post List' ],
];

const dynamicReplacements = [
	// テーマディレクトリ URL（src 属性 / JSON の url プロパティ / CSS url()）
	[ 'src="http://localhost:8888/wp-content/themes/x-t9', 'src="<?php echo esc_url( get_template_directory_uri() ); ?>' ],
	[ '"url":"http://localhost:8888/wp-content/themes/x-t9', '"url":"<?php echo esc_url( get_template_directory_uri() ); ?>' ],
	[ 'url(http://localhost:8888/wp-content/themes/x-t9', 'url(<?php echo esc_url( get_template_directory_uri() ); ?>' ],
	// 投稿アーカイブへのリンク
	[ 'href="http://localhost:8888/information/', 'href="<?php echo esc_url( get_post_type_archive_link( \'post\' ) ); ?>' ],
	// クエリーループの「続きを読む」ラベル（moreText 属性）
	[ '"moreText":"Read more"', '"moreText":"<?php echo esc_html__( \'Read more\', \'x-t9\' ); ?>"' ],
	// 「Category : 」プレフィックス
	[ '"Category : "', '"<?php echo esc_html__( \'Category : \', \'x-t9\' ); ?>"' ],
	// "label":"テキスト"（wp:search 等）を翻訳関数経由に置換する。
	// 既に <?php ... ?> へ変換済みの値は二重変換しないようスキップする。
	[
		/"label":"((?:(?!<\?php)[^"])+)"/g,
		function ( match, text ) {
			return '"label":"<?php echo esc_html__( \'' + text.replace( /'/g, '\\\'' ) + '\', \'x-t9\' ); ?>"';
		},
	],
	// wp:navigation 内の "ref":数字 を削除（開発環境固有のメニュー ID を本番に持ち込まない）。
	// wp:navigation の開始タグに限定して処理することで、wp:block（同期パターン/再利用ブロック）など
	// 別ブロックの ref を誤って削除しないようにする。ref が属性のどの位置にあっても対応する。
	[
		/<!-- wp:navigation \{[\s\S]*?-->/g,
		function ( tag ) {
			return tag
				.replace( /"ref":\d+,?/, '' ) // ref 属性を除去
				.replace( /,\}/, '}' );       // ref が末尾だった場合のダンギングカンマを修正
		},
	],
];

// 要素テキスト（>ラベル</）を翻訳関数へ置換する対象ラベル。
const translatableLabels = [
	'Service',
	'Information',
	'Read more',
	'Main Column',
	'Side Column',
	'Contact',
	'Category',
	'Archive',
	'Tag Cloud',
	'Search',
	'No posts.',
	'Service Flow',
	'Post List',
];
translatableLabels.forEach( function ( label ) {
	dynamicReplacements.push( [
		'>' + label + '</',
		'><?php echo esc_html__( \'' + label + '\', \'x-t9\' ); ?></',
	] );
} );

gulp.task('convert-dynamic', function () {
	// 日本語→英語 → URL/ラベル変換 の順で適用する。
	const replacements = japaneseToEnglish.concat( dynamicReplacements );

	// 全置換を 1 つのストリームに連結し、stream を return して gulp に完了を待たせる。
	return replacements.reduce(
		function ( stream, pair ) {
			return stream.pipe( replace( pair[0], pair[1] ) );
		},
		gulp.src( [ './patterns/*.php' ] )
	).pipe( gulp.dest( './patterns/' ) );
});

gulp.task('remove-theme-name', function () {
    const targetFiles = './**/*.html';  // HTMLfiles path
    return gulp.src(targetFiles, { base: './' })
        .pipe(replace('"theme":"x-t9",', ''))
        .pipe(gulp.dest('.'));
});

gulp.task('dist', function() {
	return gulp.src(
			[
				'./**/*.json',
				'./**/*.php',
				'./**/*.txt',
				'./**/*.css',
				'./**/*.scss',
				'./**/*.bat',
				'./**/*.rb',
				'./**/*.eot',
				'./**/*.svg',
				'./**/*.ttf',
				'./**/*.woff',
				'./**/*.woff2',
				'./**/*.otf',
				'./**/*.less',
				'./**/*.png',
				'./assets/**',
				'./inc/**',
				'./parts/**',
				'./vendor/**',
				'./templates/**',
				'./LICENSE',
				'!./.wp-env.json',
				'!./.wp-env.override.json',
				'!./package.json',
				'!./package-lock.json',
				'!./composer.json',
				'!./composer.lock',
				"!./tests/**",
				"!./dist/**",
				"!./node_modules/**",
				"!./docs/**"
			],
			{
				base: './',
				// バイナリファイル（画像など）の破損を防ぐため encoding: false を指定する。
				encoding: false,
			}
		)
		.pipe( gulp.dest( 'dist/x-t9' ) );
} );