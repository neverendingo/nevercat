'use strict';
module.exports = function(grunt) {
    require('load-grunt-tasks')(grunt);
    require('time-grunt')(grunt);
    
    grunt.initConfig({
        
        pkg: grunt.file.readJSON('package.json'),
        
        /*
         * Copy necessary vendor js files
         */
        copy: {
            scripts: {
                expand: true,
                cwd: 'bower_components/foundation/js/vendor/',
                src: '**',
                flatten: 'true',
                dest: 'js/vendor/'
            }
        },
        
        /*
         * Run sass compilation
         */
        sass: {
            options: {
                sourceMap: false
            },
    
            dist: {
                options: {
                  outputStyle: 'compressed'
                },
                files: {
                  'css/<%= pkg.name %>.css': 'scss/foundation.scss'
                }
            }
        },
        
        /*
         * Check for js mistakes
         */
        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'js/*.js',
                'js/custom/*.js',
                '!js/nevercat.js',
                '!js/*.min.*'
            ]
        },
    
        /*
         * Minify js
         */
        uglify: {
            dist: {
                files: {
                    'js/<%= pkg.name %>.js': ['js/<%= pkg.name %>.js']
                }
            }
        },
        
        /*
         * Concat js files
         */
        concat: {
            scripts: {
                options: {
                    separator: ';',
                },
                src: [
                    'bower_components/foundation/js/foundation/foundation.js',
                    'bower_components/foundation/js/foundation/foundation.abide.js',
                    'bower_components/foundation/js/foundation/foundation.accordion.js',
                    'bower_components/foundation/js/foundation/foundation.alert.js',
                    'bower_components/foundation/js/foundation/foundation.clearing.js',
                    'bower_components/foundation/js/foundation/foundation.dropdown.js',
                    'bower_components/foundation/js/foundation/foundation.equalizer.js',
                    'bower_components/foundation/js/foundation/foundation.interchange.js',
                    'bower_components/foundation/js/foundation/foundation.joyride.js',
                    'bower_components/foundation/js/foundation/foundation.magellan.js',
                    'bower_components/foundation/js/foundation/foundation.offcanvas.js',
                    'bower_components/foundation/js/foundation/foundation.orbit.js',
                    'bower_components/foundation/js/foundation/foundation.reveal.js',
                    'bower_components/foundation/js/foundation/foundation.slider.js',
                    'bower_components/foundation/js/foundation/foundation.tab.js',
                    'bower_components/foundation/js/foundation/foundation.tooltip.js',
                    'bower_components/foundation/js/foundation/foundation.topbar.js',

                    'js/custom/*.js'
                ],
                dest: 'js/<%= pkg.name %>.js',
            },
        },
        
        /*
         * run autoprefixer
         */
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'android 2.3', 'android 4', 'opera 12'],
                map: true
            },
            dist: {
                src: 'css/<%= pkg.name %>.css',
                dest: 'css/<%= pkg.name %>.css',
            }
        },
        
        /*
         * Watch source files for changes
         */
        watch: {
            grunt: { files: ['Gruntfile.js'] },
            sass: {
                files: 'scss/**/*.scss',
                tasks: ['sass']
            },
            js: {
                files: 'js/custom/*.js',
                tasks: ['jshint', 'uglify', 'concat']
            }
        }
    });
    
    // Register tasks
    grunt.registerTask('default', [
        'dev'
    ]);
    grunt.registerTask('dev', [
        'copy',
        'sass',
        'jshint',
        'uglify',
        'autoprefixer',
        'concat'
    ]);
};
