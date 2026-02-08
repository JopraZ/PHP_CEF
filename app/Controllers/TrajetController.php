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
            $agences =(new Agence())->findAll();

            require __DIR__ . '/../Views/Layout/header.php';
            require __DIR__ . '/../Views/trajet/create.php';
            require __DIR__ . '/../Views/Layout/footer.php';
        }
        
        public function store(): void 
        {
            $data = [
                'id_agence_depart'=> $_POST['depart'],
                'id_agence_arrive'=> $_POST['arrivee'],
                'date_depart'=> $_POST['date_depart'],
                'date_arrive'=> $_POST['date_arrive'],
                'places_total'=> $_POST['places_total'],
                'places_disponible'=> $_POST['places_disponible'],
                'id_users'=> $_SESSION['user']['id'],
            ];

            (new Trajet())->create($data);

            $_SESSION['success'] = 'Trajet created successfully.';
            header('Location: /');
            exit();
        }

        public function delete(int $id): void 
        {

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

        // 🔐 Sécurité : seul l’auteur peut modifier
        if ((int) $_SESSION['user']['id'] !== (int) $trajet['id_users']) {
            $_SESSION['error'] = 'Accès interdit.';
            header('Location: /');
            exit;
        }

        // ✅ C’EST CETTE LIGNE QUI MANQUAIT
        $agences = (new \Louis\PhpCef\Models\Agence())->findAll();

        require __DIR__ . '/../Views/Layout/header.php';
        require __DIR__ . '/../Views/trajet/edit.php';
        require __DIR__ . '/../Views/Layout/footer.php';
    }




    public function show(int $id): void
    {
        $trajetModel = new Trajet();
        $trajet = $trajetModel->findById($id);

        if (!$trajet) {
            $_SESSION['error'] = 'Trajet not found.';
            header('Location: /');
            exit();
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

        // 🔐 Sécurité : seul l’auteur peut modifier
        if ((int) $_SESSION['user']['id'] !== (int) $trajet['id_users']) {
            $_SESSION['error'] = 'Accès interdit.';
            header('Location: /');
            exit;
        }

        // 📥 Données POST
        $data = [
            'id_agence_depart'  => $_POST['depart'] ?? null,
            'id_agence_arrive'  => $_POST['arrivee'] ?? null,
            'date_depart'       => $_POST['date_depart'] ?? null,
            'date_arrive'       => $_POST['date_arrive'] ?? null,
            'places_total'      => $_POST['places_total'] ?? null,
            'places_disponible' => $_POST['places_disponible'] ?? null,
        ];

        // ❌ Validation minimale
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

        // 💾 Update
        $trajetModel->update($id, $data);

        $_SESSION['success'] = 'Trajet mis à jour avec succès.';
        header('Location: /');
        exit;
    }


}