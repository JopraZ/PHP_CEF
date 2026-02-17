<?php
namespace Louis\PhpCef\Controllers;

use Louis\PhpCef\Models\User;
use Louis\PhpCef\Models\Agence;
use Louis\PhpCef\Models\Trajet;


class AdminController
{
    public function dashboard():void
    {
        require __DIR__ . "/../Views/Layout/header.php";
        require __DIR__ . '/../Views/admin/dashboard.php';
        require __DIR__ . "/../Views/Layout/footer.php";
    }

    public function users():void
    {
        $users=(new User())->findAll();

        require __DIR__ . "/../Views/Layout/header.php";
        require __DIR__ . '/../Views/admin/users.php';
        require __DIR__ ."/../Views/Layout/footer.php";
    }

    public function agences():void
    {
        $agences=(new Agence())->findAll();

        require __DIR__ . "/../Views/Layout/header.php";
        require __DIR__ . '/../Views/admin/agences.php';
        require __DIR__ ."/../Views/Layout/footer.php";
    }

    public function trajets():void
    {
        $trajets=(new Trajet())->findAvailable();

        require __DIR__ . "/../Views/Layout/header.php";
        require __DIR__ . '/../Views/admin/trajets.php';
        require __DIR__ ."/../Views/Layout/footer.php";
    }

    public function createAgence(): void 
    { 
        $nom = trim($_POST['nom'] ?? '');

        if (empty($nom)) {
            $_SESSION['error'] = 'Le nom de l\'agence est requis.';
            header('Location: /admin/agences');
            exit;
        }

        (new Agence())->create($nom);

        $_SESSION['success'] = 'Agence créée avec succès.';
        header('Location: /admin/agences');
        exit;
    }

    public function deleteAgence(int $id): void 
    { 
        (new Agence())->delete($id);

        $_SESSION['success'] = 'Agence supprimée avec succès.';
        header('Location: /admin/agences');
        exit;
    }

    public function editAgence(int $id): void 
    { 
        $agence = (new \Louis\PhpCef\Models\Agence())->find($id);

        if(!$agence) {
            $_SESSION['error'] = 'Agence non trouvée.';
            header('Location: /admin/agences');
            exit;
        }

        require __DIR__ . "/../Views/Layout/header.php";
        require __DIR__ . "/../Views/admin/agence_edit.php";
        require __DIR__ . "/../Views/Layout/footer.php";
    }

    public function updateAgence(int $id): void 
    { 
        $nom = trim($_POST['nom'] ?? '');

        if (empty($nom)) {
            $_SESSION['error'] = 'Le nom de l\'agence est requis.';
            header('Location: /admin/agences/edit/$id');
            exit;
        }

        (new \Louis\PhpCef\Models\Agence())->update($id, $nom);

        $_SESSION['success'] = 'Agence mise à jour avec succès.';
        header('Location: /admin/agences');
        exit;
    }

    public function deleteTrajet(int $id): void 
    { 
        (new Trajet())->delete($id);

        $_SESSION['success'] = 'Trajet supprimé avec succès.';
        header('Location: /admin/trajets');
        exit;
    }

}