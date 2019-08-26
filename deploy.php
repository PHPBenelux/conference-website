<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'phpbenelux_conference');

// Project repository
set('repository', 'git@github.com:PHPBenelux/conference-website.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);

// Use sudo
set('writable_use_sudo', true);
set('clear_use_sudo', true);
set('cleanup_use_sudo', true);

// Hosts
inventory('hosts.yml');
    
// Tasks
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
