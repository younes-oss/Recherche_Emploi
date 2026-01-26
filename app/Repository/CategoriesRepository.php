<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Categorie;
use PDO;

class CategoriesRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function addCategorie($categorie)
    {
        $query = 'insert into categories (titre) values(:titre)';
        $stmt = $this->conn->prepare($query);
        $titre = $categorie->getTitre();
        $stmt->bindParam(":titre", $titre);
        $stmt->execute();
    }
    public function deleteCategorie($categorie)
    {
        $query = 'delete from categories where titre = :titre';
        $stmt = $this->conn->prepare($query);
        $titre = $categorie->getTitre();
        $stmt->bindParam(":titre", $titre);
        $stmt->execute();
    }
    public function checkIfExists($titre)
    {
        $query = "select * from categories where titre = '$titre' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        } else {
            return false;
        }
    }


    public function findById(int $id): ?Categorie
    {
        $query = "SELECT * FROM categories WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Categorie(
            $row['titre'],
            (int)$row['id']
        );
    }



    public function getAllcategories()
    {
        $categories = [];
        $query = "select * from categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $cat = new Categorie($row["titre"]);
            $cat->setId($row["id"]);
            $categories[] =  $cat;
        }
        return $categories;
    }
}
