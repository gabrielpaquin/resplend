module.exports = function(grunt) {
	// 1. Configuration de l'ensemble des tâches
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		// 2. Configuration des tâches

		concat: {
			dist:{
				src: [
					'src/js/vendor/*.js',
					'src/js/app.js'
				],
				dest: 'src/js/app.concat.js'
			}
		},
		uglify: {
			build: {
				src: 'src/js/app.concat.js',
				dest: 'js/app.min.js'
			}
		},
		watch: {
			js: {
				files: ['src/js/app.js'],
				tasks: ['concat','uglify']
			}
		}
	});

	//3. Déclaration des extensions
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-sass');

	//4. Déclaration des tâches à exécuter
	grunt.registerTask('default',['concat','uglify','watch']);
}