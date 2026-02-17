<?php

namespace Louis\PhpCef\Middlewares;

class AdminMiddleware {
    public static function handle(): void
    {
        if (
            !isset($_SESSION['user']) ||
            $_SESSION['user']['role'] !== 'ADMIN'
        ) {
            $_SESSION ['error'] = 'You must be an admin to access this page.';
            header('Location: /');
            exit;
        }
    }
}