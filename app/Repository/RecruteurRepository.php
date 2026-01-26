<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Recruteur;
use PDO;

class RecruteurRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findById(int $id): ?Recruteur
    {
        $sql = "SELECT * FROM recruteurs WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $recruteur = new Recruteur(
            $data['name'],
            $data['email'],
            $data['password'],
            $data['company_name']
        );
        $recruteur->setId((int)$data['id']);

        return $recruteur;
    }
}