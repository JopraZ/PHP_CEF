<?php
namespace Louis\PhpCef\Controllers;

use Louis\PhpCef\Models\Trajet;

class TrajetController
{
    
public function index(): void
{
    try {
        $trajetModel = new Trajet();
        $trajets = $trajetModel->findAvailable();

        echo '<pre>';
        print_r($trajets);
        echo '</pre>';
    } catch (\Throwable $e) {
        echo '<pre>';
        echo $e->getMessage();
        echo '</pre>';
    }
}
}
