<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Recruteur;
use App\Entity\Categorie;
use App\Entity\Tag;
use PDO;

class TempRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findRecruteurById(int $id): ?Recruteur
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

    public function findCategorieById(int $id): ?Categorie
    {
        $sql = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $categorie = new Categorie($data['titre'], $data['description'], (int)$data['id']);

        return $categorie;
    }

    public function findTagById(int $id): ?Tag
    {
        $sql = "SELECT * FROM tags WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $tag = new Tag($data['titre'], (int)$data['id']);

        return $tag;
    }
}
