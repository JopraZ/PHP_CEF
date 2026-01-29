<?php

namespace Louis\PhpCef\Controllers;

use Louis\PhpCef\Models\User;

class AuthController
{
    public function login(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /');
        exit;
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Veuillez remplir tous les champs.';
        header('Location: /');
        exit;
    }

    $userModel = new \Louis\PhpCef\Models\User();
    $user = $userModel->findByEmail($email);

    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['error'] = 'Identifiants incorrects.';
        header('Location: /');
        exit;
    }

    // ✅ Connexion réussie
    $_SESSION['user'] = [
        'id'     => $user['id_user'],
        'prenom' => $user['prenom'],
        'nom'    => $user['nom'],
        'role'   => $user['role'],
    ];

    $_SESSION['success'] = 'Bienvenue ' . $user['prenom'];

    // 🔀 REDIRECTION SELON LE RÔLE
    if ($user['role'] === 'ADMIN') {
        header('Location: /admin');
    } else {
        header('Location: /');
    }

    exit;
}


    public function logout(): void
    {
        session_destroy();
        header('Location: /');
        exit;
    }
}
