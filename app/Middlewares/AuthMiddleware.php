<?php

namespace Louis\PhpCef\Middlewares;

class AuthMiddleware
{
    public static function handle(): void
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = 'You must be logged in to access this page.';
            header('Location: /');
            exit;
        }
    }
}
