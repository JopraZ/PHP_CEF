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

    if (!$email || !$password) {
        $_SESSION['error'] = 'Champs manquants.';
        header('Location: /');
        exit;
    }

    $user = (new User())->findByEmail($email);

    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['error'] = 'Identifiants incorrects.';
        header('Location: /');
        exit;
    }
    $_SESSION['user'] = [
        'id' => (int) $user['id_user'],
        'email' => $user['mail'],
        'prenom' => $user['prenom'],
        'nom'    => $user['nom'],
        'role'  => $user['role'],
    ];

    header('Location: ' . ($user['role'] === 'ADMIN' ? '/admin' : '/'));
    exit;
}

public function logout(): void
{
    session_destroy();
    header('Location: /');
    exit;
}


}
