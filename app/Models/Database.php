<?php

namespace Louis\PhpCef\Models;

use PDO;
use PDOException;

class Database {
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {

            $host = 'localhost';
            $dbname = 'touche_pas_au_klaxon';
            $user = 'root';
            $pass = '';

            try {
                self::$pdo = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                    $user,
                    $pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );

            } catch (PDOException $e) {
                die('Erreur connexion DB : ' . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
