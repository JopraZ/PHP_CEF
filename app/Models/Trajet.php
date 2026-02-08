<?php

namespace Louis\PhpCef\Models;


class Trajet extends BaseModel {

    public function findAvailable(): array {
        $sql = "
            SELECT t.*,
                   a1.nom AS agence_depart,
                   a2.nom AS agence_arrive
            FROM trajets t
            JOIN agences a1 ON t.id_agence_depart = a1.id_agences
            JOIN agences a2 ON t.id_agence_arrive = a2.id_agences
            WHERE t.places_disponible > 0
              AND t.date_depart > NOW()
            ORDER BY t.date_depart ASC";

        return $this->db->query($sql)->fetchAll();
    }

    public function delete(int $id): void {
        $stmt = $this->db->prepare("DELETE FROM trajets WHERE id_trajet = :id");
        $stmt->execute(['id' => $id]);
    }

    public function findById(int $id): ?array {
        $stmt = $this->db->prepare("
            SELECT t.*,
                   a1.nom AS agence_depart,
                   a2.nom AS agence_arrive,
                   u.nom,
                   u.prenom,
                   u.telephone,
                   u.mail
            FROM trajets t
            JOIN agences a1 ON t.id_agence_depart = a1.id_agences
            JOIN agences a2 ON t.id_agence_arrive = a2.id_agences
            JOIN users u ON t.id_users = u.id_users
            WHERE t.id_trajet = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function update(int $id, array $data): void
    {
        $sql = "
            UPDATE trajets
            SET
                id_agence_depart  = :id_agence_depart,
                id_agence_arrive  = :id_agence_arrive,
                date_depart       = :date_depart,
                date_arrive       = :date_arrive,
                places_total      = :places_total,
                places_disponible = :places_disponible
            WHERE id_trajet = :id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id_agence_depart'  => $data['id_agence_depart'],
            'id_agence_arrive'  => $data['id_agence_arrive'],
            'date_depart'       => $data['date_depart'],
            'date_arrive'       => $data['date_arrive'],
            'places_total'      => $data['places_total'],
            'places_disponible' => $data['places_disponible'],
            'id'                => $id,
        ]);
    }


    public function create(array $data): void
{
    $sql = "
        INSERT INTO trajets (
            id_agence_depart,
            id_agence_arrive,
            date_depart,
            date_arrive,
            places_total,
            places_disponible,
            id_users
        ) VALUES (
            :id_agence_depart,
            :id_agence_arrive,
            :date_depart,
            :date_arrive,
            :places_total,
            :places_disponible,
            :id_users
        )
    ";

    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        'id_agence_depart'   => $data['id_agence_depart'],
        'id_agence_arrive'   => $data['id_agence_arrive'],
        'date_depart'        => $data['date_depart'],
        'date_arrive'        => $data['date_arrive'],
        'places_total'       => $data['places_total'],
        'places_disponible'  => $data['places_disponible'],
        'id_users'           => $data['id_users'],
    ]);
}


}