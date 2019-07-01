<?php
namespace Deployer;

require 'recipe/laravel.php';
// phpdotenvを呼びすようにする
$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
// with(new \Dotenv\Dotenv(__DIR__))->load();

set('application', env('APP_NAME'));
// 'git@github.com:Fendo181/lolipop-mc-starter-laravel.git'
// https://github.com/RikuHirose/shunta-webapp.git
set('repository', 'https://github.com/RikuHirose/shunta-webapp.git');
// 'master'
set('branch', 'master');
set('git_tty', false);
set('http_user', 'www-data');
set('writable_mode', 'chmod');

add('shared_files', ['.env']);
add('shared_dirs', []);
add('writable_dirs', ['bootstrap/cache', 'storage']);

host(env('DEPLOYER_MC_HOST'))
    ->stage('production')
    ->user(env('DEPLOYER_MC_USER'))
    ->port(env('DEPLOYER_MC_PORT'))
    // '~/.ssh/id_rsa'
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/');

task('build', function () {
    run('cd {{release_path}} && build');
    run('chmod 777 storage -R');
    run('chmod 777 bootstrap/cache -R');
});

// .envをアップロードする
task('upload:env', function () {
    upload('.env.prod', '{{deploy_path}}/shared/.env');
})->desc('.envをアップロード');

before('deploy:shared','upload:env');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
// before('deploy:symlink', 'artisan:migrate');
// before('deploy:symlink', 'artisan:admin:install');
// before('deploy:symlink', 'artisan:db:seed');
 // php ./vendor/bin/dep deploy production