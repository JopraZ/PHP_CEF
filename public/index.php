<?php
declare(strict_types=1);

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Buki\Router\Router;

$router = new Router();

require __DIR__ . '/../routes/web.php';

$router->run();