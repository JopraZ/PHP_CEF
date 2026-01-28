<?php

use Louis\PhpCef\Controllers\TrajetController;

$router->get('/', function () {
    (new TrajetController())->index();
});
