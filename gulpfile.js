var gulp = require('gulp');

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