'use strict';

module.exports = function (grunt) {

	const sass = require('node-sass');

	// Load grunt tasks automatically
	require('load-grunt-tasks')(grunt);

	// Define shared variables for all tasks

	var jsUglifyFileMap = {
		// scripts.min.js contains all the scripts we want to load
		// at the footer on every page
		'_assets/js/scripts.js': [
			'_assets/js/lib/picturefill.3.0.2.min.js', // already minified, but we want to concat it
			'_assets/js/lib/stickyfill.min.js',
			'_assets/js/lib/priority-nav.js',
			'_assets/js/lib/jquery.sticky.js',
			'_assets/js/src/scripts/*.js'
		],
		// scripts for the backend
		'_assets/js/customizer.js': ['_assets/js/src/customizer.js']
	};

	// Define the configuration for all the tasks
	grunt.initConfig({
		// Add vendor prefixed styles
		autoprefixer: {
			dist: {
				files: {
					'style.css': 'style.css',
					'editor-style.css': 'editor-style.css',
					'block-editor-style.css': 'block-editor-style.css',
				}
			},
			options: {
				map: true,
				browsers: ['last 2 version', 'ie 9', '> 1%']
			}
		},

		sass: {
			options: {
				implementation: sass,
				sourceMap: true,
				outputStyle: 'compressed',
			},
			dist: {
				files: {
					'style.css': '_assets/sass/style.scss',
					'editor-style.css': '_assets/sass/editor-style.scss',
					'block-editor-style.css': '_assets/sass/block-editor-style.scss',
				}
			}
		},

		uglify: {
			dev: {
				options: {
					mangle: false,
					beautify: true,
					sourceMap: true
				},
				files: jsUglifyFileMap
			},
			dist: {
				files: jsUglifyFileMap
			},

		},

		watch: {
			sass: {
				files: ['_assets/sass/**/*.scss'],
				tasks: ['sass', 'autoprefixer']
			},
			uglify: {
				files: ['_assets/js/src/**/*.js'],
				tasks: ['uglify:dist']
			},
			php: {
				files: ['**/*.php']
			},
			options: {
				livereload: true,
			},
		}

	});

	// Define your default tasks
	grunt.registerTask('default', [
		'sass',
		'autoprefixer',
		'uglify:dist'
	]);

	grunt.registerTask('dev', [
		'default',
		'watch',
	]);

	grunt.registerTask('debug', [
		'uglify:dev'
	]);

	grunt.registerTask('build', [
		'default'
	]);
};
