<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = 'engine/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require 'engine/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once 'engine/bootstrap/app.php';

$app->handleRequest(Request::capture());
