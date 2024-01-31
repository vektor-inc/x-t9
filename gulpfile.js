var gulp = require('gulp');

const replace = require('gulp-replace')

gulp.task('convert-dynamic', function (done) {
	gulp.src(['./inc/patterns/*.php' ])
		.pipe(replace( 'src="http://localhost:8888/wp-content/themes/x-t9', 'src="\' . esc_url( get_template_directory_uri() ) . \'' ))
		.pipe(gulp.dest('./inc/patterns/'));
	// post top link
	gulp.src(['./inc/patterns/*.php' ])
		.pipe(replace( 'href="http://localhost:8888/information/', 'href="\' . esc_url( get_post_type_archive_link( \'post\' )  ) . \'' ))
		.pipe(gulp.dest('./inc/patterns/'));
	gulp.src(['./inc/patterns/*.php' ])
		.pipe(replace( '続きを読む', 'Read more' ))
		.pipe(gulp.dest('./inc/patterns/'));
	gulp.src(['./inc/patterns/*.php' ])
		.pipe(replace( 'お知らせ', 'Information' ))
		.pipe(gulp.dest('./inc/patterns/'));
	gulp.src(['./inc/patterns/*.php' ])
		.pipe(replace( 'カテゴリー', 'Category' ))
		.pipe(gulp.dest('./inc/patterns/'));
	done();
});

gulp.task('dist', function() {
	return gulp.src(
			[
				'!./.wp-env.json',
				'!./.wp-env.override.json',
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
				"!./tests/**",
				"!./dist/**",
				"!./node_modules/**"
			],
			{ base: './' }
		)
		.pipe( gulp.dest( 'dist/x-t9' ) );
} );