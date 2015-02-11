module.exports = function (grunt) {

    //setup file list for copying/ not copying for SVN
    files_list = [
        '**',
        '!node_modules/**',
        '!release/**',
        '!.git/**',
        '!.sass-cache/**',
        '!Gruntfile.js',
        '!package.json',
        '!.gitignore',
        '!.gitmodules',
        '!bin/**',
        '!tests/**',
        '!.gitattributes',
        '!.travis.yml',
        '!composer.lock',
        '!composer.json',
        '!CONTRIBUTING.md',
        '!git-workflow.md',
        '!phpunit.xml.dist'
    ];

    // Project configuration.
    grunt.initConfig({
        pkg     : grunt.file.readJSON( 'package.json' ),
        clean: {
            post_build: [
                'build'
            ]
        },
        copy: {
            svn_trunk: {
                options : {
                    mode :true
                },
                src:  files_list,
                dest: 'build/<%= pkg.name %>/trunk/'
            },
            svn_tag: {
                options : {
                    mode :true
                },
                src:  files_list,
                dest: 'build/<%= pkg.name %>/tags/<%= pkg.version %>/'
            }
        },
        gittag: {
            addtag: {
                options: {
                    tag: '2.x/<%= pkg.version %>',
                    message: 'Version <%= pkg.version %>'
                }
            }
        },
        gitcommit: {
            commit: {
                options: {
                    message: 'Version <%= pkg.version %>',
                    noVerify: true,
                    noStatus: false,
                    allowEmpty: true
                },
                files: {
                    src: [ 'README.md', 'readme.txt', 'init.php', 'package.json', 'languages/**' ]
                }
            }
        },
        gitpush: {
            push: {
                options: {
                    tags: true,
                    remote: 'origin',
                    branch: 'master'
                }
            }
        },
        replace: {
            reamde_md: {
                src: [ 'README.md' ],
                overwrite: true,
                replacements: [{
                    from: /~Current Version:\s*(.*)~/,
                    to: "~Current Version: <%= pkg.version %>~"
                }, {
                    from: /Stable tag: (.*)/,
                    to: "Stable tag: <%= pkg.version %>"
                }]
            },
            reamde_txt: {
                src: [ 'readme.txt' ],
                overwrite: true,
                replacements: [{
                    from: /Stable tag: (.*)/,
                    to: "Stable tag: <%= pkg.version %>"
                }]
            },
            plugin_php: {
                src: [ 'plugin.php' ],
                overwrite: true,
                replacements: [{
                    from: /Version:\s*(.*)/,
                    to: "Version: <%= pkg.version %>"
                }]
            },
            wpcac_api_php: {
                src: [ 'wpcac.api.php' ],
                overwrite: true,
                replacements: [{
                    from: /plugin_version = '\s*(.*)'/,
                    to: "plugin_version = '<%= pkg.version %>'"
                }]
            }
        },
        svn_checkout: {
            make_local: {
                repos: [{
                    path: [ 'release' ],
                    repo: 'http://plugins.svn.wordpress.org/wpcommand'
                }]
            }
        },
        push_svn: {
            options: {
                remove: true
            },
            main: {
                src: 'release/<%= pkg.name %>',
                dest: 'http://plugins.svn.wordpress.org/wpcommand',
                tmp: 'build/make_svn'
            }
        }
    });

    //load modules
    grunt.loadNpmTasks( 'grunt-contrib-clean' );
    grunt.loadNpmTasks( 'grunt-contrib-copy' );
    grunt.loadNpmTasks( 'grunt-git' );
    grunt.loadNpmTasks( 'grunt-text-replace' );
    grunt.loadNpmTasks( 'grunt-svn-checkout' );
    grunt.loadNpmTasks( 'grunt-push-svn' );
    grunt.loadNpmTasks( 'grunt-remove' );

    //register default task

    //release tasks
    grunt.registerTask( 'version_number', [ 'replace:reamde_md', 'replace:reamde_txt', 'replace:plugin_php', 'replace:wpcac_api_php' ] );
    grunt.registerTask( 'pre_vcs', [ 'version_number' ] );
    grunt.registerTask( 'do_svn', [ 'svn_checkout', 'copy:svn_trunk', 'copy:svn_tag'] );
    //grunt.registerTask( 'do_svn', [ 'svn_checkout', 'copy:svn_trunk', 'copy:svn_tag', 'push_svn' ] );
    grunt.registerTask( 'do_git', [ 'gitcommit', 'gittag', 'gitpush' ] );

    grunt.registerTask( 'release', [ 'pre_vcs', 'do_svn', 'do_git', 'clean:post_build' ] );


};
