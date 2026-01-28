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
}