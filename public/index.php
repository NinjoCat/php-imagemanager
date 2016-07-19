<?php
require_once '../vendor/autoload.php';

\ImageManagerDemo\ImageManagerDemoConfig::init();

\OLOG\Auth\RegisterRoutes::registerRoutes();
\OLOG\Router::matchAction(\ImageManagerDemo\DemoAction::class, 0);

\OLOG\ImageManager\ImageManagerRouting::register();

// support for local php server (php -S) - tells local server to return static files
/*
if (\OLOG\ConfWrapper::value('return_false_if_no_route', false)) {
    return false;
}
*/