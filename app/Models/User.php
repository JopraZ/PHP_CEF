<?php

namespace Louis\PhpCef\Models;

class User extends BaseModel {

    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE mail = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        return $user ?: null;
    }

    public function findAll(): array {
        $stmt = $this->db->query("SELECT id_user, nom, prenom, mail, role FROM users");
        return $stmt->fetchAll();
    }
}