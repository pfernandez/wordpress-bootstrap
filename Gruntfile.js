'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'library/js/scripts.js',
        'bower_components/bootstrap/js/*.js'
      ]
    },
    less: {
      dist: {
        files: {
          'library/dist/css/styles.min.css': [
            'library/less/styles.less'
          ]
        },
        options: {
          compress: true,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: true,
          sourceMapFilename: 'library/dist/css/styles.css.map',
          sourceMapRootpath: '/wp-content/themes/wordpress-bootstrap/' // If you name your theme something different you may need to change this
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'library/dist/js/scripts.min.js': [
            'library/js/*.js',
            
            // Uncomment bootstrap js files here as needed.
            
            //'bower_components/bootstrap/js/affix.js',
            //'bower_components/bootstrap/js/alert.js',
            //'bower_components/bootstrap/js/button.js',
            //'bower_components/bootstrap/js/carousel.js',
            //'bower_components/bootstrap/js/collapse.js',
            'bower_components/bootstrap/js/dropdown.js',
            //'bower_components/bootstrap/js/modal.js',
            //'bower_components/bootstrap/js/popover.js',
            //'bower_components/bootstrap/js/scrollspy.js',
            //'bower_components/bootstrap/js/tab.js',
            //'bower_components/bootstrap/js/tooltip.js',
            //'bower_components/bootstrap/js/transition.js'
          ]
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
    grunticon: {
      myIcons: {
          files: [{
              expand: true,
              cwd: 'library/img',
              src: ['*.svg', '*.png'],
              dest: "library/img"
          }],
          options: {
          }
      }
    },
    version: {
      assets: {
        files: {
          'functions.php': ['library/dist/css/styles.min.css', 'library/dist/js/scripts.min.js']
        }
      }
    },
    watch: {
      less: {
        files: [
          'bower_components/bootstrap/less/*.less',
          'bower_components/font-awesome/less/*.less',
          'library/less/*.less'
        ],
        tasks: ['less', 'version']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'library/dist/css/styles.min.css',
          'library/js/*',
          'style.css',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'library/dist/css',
        'library/dist/js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-wp-assets');
  grunt.loadNpmTasks('grunt-grunticon');
  grunt.loadNpmTasks('grunt-svgstore');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'uglify',
    'grunticon',
    'version'
  ]);

  grunt.registerTask('build', [
    'clean:dist',
    'less',
    'uglify',
    'grunticon',
    'version'
  ]);

  grunt.registerTask('dev', [
    'grunticon',
    'watch'
  ]);

};
