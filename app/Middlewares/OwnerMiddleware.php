<?php

namespace Louis\PhpCef\Middlewares;

class OwnerMiddleware {
    public static function handle(array $trajet): void
    {
        if ($trajet['id_users'] !== $_SESSION['user']['id']) {
            $_SESSION['error'] = 'You do not have permission to perform this action.';
            header('Location: /');
            exit();
        }
    }
}