<?php

/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'trellite',
        'charset'     => 'utf8',
    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => '/',
    ]
    
    // // https://stackoverflow.com/questions/36188800/class-users-not-found-in-phalcon-2
    // 'application' => [
    //     'environment' => 'development',
    //     'controllers' => APP_DIR .'controllers/',
    //     'library' => APP_DIR .'library/',
    //     'models' => APP_DIR .'models/',
    //     'plugins' => APP_DIR .'plugins/',
    //     'routes' => APP_DIR .'routes/',
    //     'logs' => APP_DIR .'logs/',
    //     'base_uri' => '/',
    //     'debug' => false
    // ]
]);
