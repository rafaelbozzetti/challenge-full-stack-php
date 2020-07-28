<?php

$config = require __DIR__ . '/config/settings.php';

$host = $config['db']['host'];
$database = $config['db']['database'];
$username = $config['db']['username'];
$password = $config['db']['password'];

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => $host,
            'name' => $database,
            'user' => $username,
            'pass' => $password,
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => $host,
            'name' => $database,
            'user' => $username,
            'pass' => $password,
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => $host,
            'name' => $database,
            'user' => $username,
            'pass' => $password,
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
