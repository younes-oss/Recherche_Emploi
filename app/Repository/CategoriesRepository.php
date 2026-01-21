<?php

namespace App\Repository;

use App\Config\Database;
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

    public function getAllcategories()
    {
        $categories = [];
        $query = "select * from categories";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $categories[] = new Categorie($row["titre"]);
        }
        return $categories = [];
    }
}
