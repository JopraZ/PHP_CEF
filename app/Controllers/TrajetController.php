<?php

namespace Louis\PhpCef\Controllers;

use Louis\PhpCef\Models\Trajet;

class TrajetController
{
    
    public function index(): void
    {
        $trajetModel = new Trajet();
        $trajets = $trajetModel->findAvailable();

        require __DIR__ . '/../Views/Layout/header.php';
        require __DIR__ . '/../Views/trajet/index.php';
        require __DIR__ . '/../Views/Layout/footer.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../Views/Layout/header.php';
        require __DIR__ . '/../Views/trajet/create.php';
        require __DIR__ . '/../Views/Layout/footer.php';
    }
    
    public function store(): void 
    {

    }

    public function delete(int $id): void 
    {

    }
}