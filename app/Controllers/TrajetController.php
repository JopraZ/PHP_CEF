<?php

namespace Louis\PhpCef\Controllers;

use Louis\PhpCef\Models\Trajet;
use Louis\PhpCef\Models\Agence;

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
        $agences = (new Agence())->findAll();

        require __DIR__ . '/../Views/Layout/header.php';
        require __DIR__ . '/../Views/trajet/create.php';
        require __DIR__ . '/../Views/Layout/footer.php';
    }
    
    public function store(): void
    {
        $data = [
            'id_agence_depart'  => $_POST['depart'] ?? null,
            'id_agence_arrive'  => $_POST['arrivee'] ?? null,
            'date_depart'       => $_POST['date_depart'] ?? null,
            'date_arrive'       => $_POST['date_arrive'] ?? null,
            'places_total'      => $_POST['places_total'] ?? null,
            'places_disponible' => $_POST['places_disponible'] ?? null,
            'id_user'           => $_SESSION['user']['id'] ?? null,
        ];
    
        if (in_array(null, $data, true)) {
            $_SESSION['error'] = 'Données manquantes.';
            header('Location: /trajet/create');
            exit;
        }

        (new Trajet())->create($data);

        $_SESSION['success'] = 'Trajet créé avec succès.';
        header('Location: /');
        exit;
    } 

    public function delete(int $id): void
    {
        (new Trajet())->delete($id);

        $_SESSION['success'] = 'Trajet supprimé.';
        header('Location: /');
        exit;
    }

    public function edit(int $id): void
    {
        $trajetModel = new Trajet();
        $trajet = $trajetModel->findById($id);

        if (!$trajet) {
            $_SESSION['error'] = 'Trajet introuvable.';
            header('Location: /');
            exit;
        }

        if ((int) $_SESSION['user']['id'] !== (int) $trajet['id_user']) {
            $_SESSION['error'] = 'Accès interdit.';
            header('Location: /');
            exit;
        }

        $agences = (new Agence())->findAll();

        require __DIR__ . '/../Views/Layout/header.php';
        require __DIR__ . '/../Views/trajet/edit.php';
        require __DIR__ . '/../Views/Layout/footer.php';
    }

    public function show(int $id): void
    {
        $trajetModel = new Trajet();
        $trajet = $trajetModel->findById($id);

        if (!$trajet) {
            $_SESSION['error'] = 'Trajet introuvable.';
            header('Location: /');
            exit;
        }

        require __DIR__ . '/../Views/Layout/header.php';
        require __DIR__ . '/../Views/trajet/show.php';
        require __DIR__ . '/../Views/Layout/footer.php';
    }

    public function update(int $id): void
    {
        $trajetModel = new Trajet();
        $trajet = $trajetModel->findById($id);

        if (!$trajet) {
            $_SESSION['error'] = 'Trajet introuvable.';
            header('Location: /');
            exit;
        }

        if ((int) $_SESSION['user']['id'] !== (int) $trajet['id_user']) {
            $_SESSION['error'] = 'Accès interdit.';
            header('Location: /');
            exit;
        }

        $data = [
            'id_agence_depart'  => $_POST['depart'] ?? null,
            'id_agence_arrive'  => $_POST['arrivee'] ?? null,
            'date_depart'       => $_POST['date_depart'] ?? null,
            'date_arrive'       => $_POST['date_arrive'] ?? null,
            'places_total'      => $_POST['places_total'] ?? null,
            'places_disponible' => $_POST['places_disponible'] ?? null,
        ];
    
                // Conversion format datetime-local → MySQL
        if (!empty($data['date_depart'])) {
            $data['date_depart'] = str_replace('T', ' ', $data['date_depart']) . ':00';
        }

        if (!empty($data['date_arrive'])) {
            $data['date_arrive'] = str_replace('T', ' ', $data['date_arrive']) . ':00';
        }


        if (
            in_array(null, $data, true) ||
            $data['id_agence_depart'] === $data['id_agence_arrive'] ||
            strtotime($data['date_arrive']) <= strtotime($data['date_depart']) ||
            (int)$data['places_disponible'] > (int)$data['places_total']
        ) {
            $_SESSION['error'] = 'Données invalides.';
            header('Location: /trajet/edit/' . $id);
            exit;
        }

        $trajetModel->update($id, $data);


        $_SESSION['success'] = 'Trajet mis à jour avec succès.';
        header('Location: /');
        exit;
    }
}
