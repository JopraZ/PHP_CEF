<?php

use Louis\PhpCef\Controllers\TrajetController;
use Louis\PhpCef\Controllers\AdminController;
use Louis\PhpCef\Controllers\AuthController;
use Louis\PhpCef\Middlewares\AuthMiddleware;
use Louis\PhpCef\Middlewares\AdminMiddleware;

/*  ==================
    Routes Trajet
    ==================  
*/

$router->get('/', function () {
    (new TrajetController())->index();
});

$router->get('/trajet/create', function () {
    AuthMiddleware::handle();
    (new TrajetController())->create();
});

$router->post('/trajet/store', function () {
    AuthMiddleware::handle();
    (new TrajetController())->store();
});

$router->get('/trajet/:id', function ($id) {
    (new TrajetController())->show((int) $id);
});

$router->post('/trajet/delete/{id}', function ($id) {
    AuthMiddleware::handle();
    (new TrajetController())->delete((int) $id);
});

$router->get('/trajet/edit/:id', function ($id) {
    AuthMiddleware::handle();
    (new TrajetController())->edit((int) $id);
});

$router->post('/trajet/update/:id', function ($id) {
    AuthMiddleware::handle();
    (new TrajetController())->update((int) $id);
});

/*  ==================
    Routes Admin
    ==================  
*/

$router->get('/admin', function () {
    AdminMiddleware::handle();
    (new AdminController())->dashboard();
});

$router->get('/admin/users', function () {
    AdminMiddleware::handle();
    (new AdminController())->users();
});

$router->post('/admin/agences/create', function () {
    AdminMiddleware::handle();
    (new AdminController())->createAgence();
});

$router->post('/admin/agences/delete/:id', function ($id) {
    AdminMiddleware::handle();
    (new AdminController())->deleteAgence((int) $id);
});

$router->post('/admin/agences/update/:id', function ($id) {
    AdminMiddleware::handle();
    (new AdminController())->updateAgence((int) $id);
});

$router->get('/admin/agences/edit/:id', function ($id) {
    AdminMiddleware::handle();
    (new AdminController())->editAgence((int) $id);
});

$router->get('/admin/agences', function () {
    AdminMiddleware::handle();
    (new AdminController())->agences();
});

$router->post('/admin/trajets/delete/:id', function ($id) {
    AdminMiddleware::handle();
    (new AdminController())->deleteTrajet((int) $id);
});

$router->get('/admin/trajets', function () {
    AdminMiddleware::handle();
    (new AdminController())->trajets();
});

/*  ==================
    Routes Auth
    ==================  
*/
$router->post('/login', function () {
    (new AuthController())->login();
});

$router->get('/logout', function () {
    (new AuthController())->logout();
});

$router->get('/login', function () {
    header('Location: /');
    exit();
});

