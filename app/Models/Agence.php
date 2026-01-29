<?php

namespace Louis\PhpCef\Models;

class Agence extends BaseModel {

    public function findAll(): array {
        return $this->db
            ->query("SELECT * FROM agences")
            ->fetchAll();
    }

    public function create(string $nom): void {
        $stmt = $this->db->prepare("INSERT INTO agences (nom) VALUES (:nom)");
        $stmt->execute(['nom' => $nom]);
    }

    public function delete(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM agences WHERE id_agences = :id");
        $stmt->execute(['id' => $id]);
    }

    public function find(int $id): array {
        $stmt = $this->db->prepare("SELECT * FROM agences WHERE id_agences = :id");
        $stmt->execute(['id' => $id]);
        $agence = $stmt->fetch();

        return $agence ?: [];
    }

    public function update(int $id, string $nom): void {
        $stmt = $this->db->prepare("UPDATE agences SET nom = :nom WHERE id_agences = :id");
        $stmt->execute([
            'nom' => $nom,
            'id' => $id
        ]);
    }
}