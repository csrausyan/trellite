<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();

    // https://stackoverflow.com/questions/36188800/class-users-not-found-in-phalcon-2
// $loader->registerDirs([
//     $config->application->controllers,
//     $config->application->library,
//     $config->application->models,
//     $config->application->plugins,
// ])->register();
// require_once APP_DIR .'vendor/autoload.php';
// 