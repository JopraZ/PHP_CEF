<?php

namespace Louis\PhpCef\Models;

use PDO;
use PDOException;

class Database {
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null){
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=touche_pas_au_klaxon;charset=utf8mb4',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die('Database connection failed');
            }
        }
        return self::$pdo;  
    }
}