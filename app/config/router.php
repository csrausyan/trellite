<?php

$router = $di->getRouter();

// default route https://www.youtube.com/watch?v=QtSySZ7NEZk&list=PLmrTMUhqzS3jd8MWP6-TvieKkPpiisJum&index=14
$router->add('/', ['controller' => 'index', 'action' => 'index']);
$router->add('/login', ['controller' => 'login', 'action' => 'index']);
$router->add('/login/submit', ['controller' => 'login', 'action' => 'loginSubmit']);

$router->notFound(['controller' => 'index', 'action'=> 'route404']);

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);
