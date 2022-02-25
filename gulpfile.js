var gulp = require('gulp');

gulp.task('dist', function() {
	return gulp.src(
			[
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
				"!./tests/**",
				"!./dist/**",
				"!./node_modules/**"
			],
			{ base: './' }
		)
		.pipe( gulp.dest( 'dist/x-t9' ) );
} );