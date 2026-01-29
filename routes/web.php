<?php

use Louis\PhpCef\Controllers\TrajetController;
use Louis\PhpCef\Controllers\AdminController;
use Louis\PhpCef\Controllers\AuthController;

/*  ==================
    Routes Trajet
    ==================  
*/

$router->get('/', function () {
    (new TrajetController())->index();
});

$router->get('/trajet/create', function () {
    (new TrajetController())->create();
});

$router->post('/trajet/strore', function () {
    (new TrajetController())->store();
});

$router->post('/trajet/delete/{id}', function ($id) {
    (new TrajetController())->delete((int) $id);
});

/*  ==================
    Routes Admin
    ==================  
*/

$router->get('/admin', function () {
    (new AdminController())->dashboard();
});

$router->get('/admin/users', function () {
    (new AdminController())->users();
});

$router->post('/admin/agences/create', function () {
    (new AdminController())->createAgence();
});

$router->post('/admin/agences/delete/:id', function ($id) {
    (new AdminController())->deleteAgence((int) $id);
});

$router->post('/admin/agences/update/:id', function ($id) {
    (new AdminController())->updateAgence((int) $id);
});

$router->get('/admin/agences/edit/:id', function ($id) {
    (new AdminController())->editAgence((int) $id);
});

$router->get('/admin/agences', function () {
    (new AdminController())->agences();
});

$router->post('/admin/trajets/delete/:id', function ($id) {
    (new AdminController())->deleteTrajet((int) $id);
});

$router->get('/admin/trajets', function () {
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

