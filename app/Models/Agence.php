<?php

namespace Louis\PhpCef\Models;

class Agence extends BaseModel {
    public function findAll(): array {
        return $this->db
            ->query("SELECT * FROM agences")
            ->fetchAll();
    }
}