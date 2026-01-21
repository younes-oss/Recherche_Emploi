<?php

namespace App\Repository;

use App\Config\Database;
use PDO;

class TagsRepository
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function addTag($tag)
    {
        $query = 'insert into tags (titre) values(:titre)';
        $stmt = $this->conn->prepare($query);
        $titre = $tag->getTitre();
        $stmt->bindParam(":titre", $titre);
        $stmt->execute();
    }
    public function deleteTag($tag)
    {
        $query = 'delete from tags where titre = :titre';
        $stmt = $this->conn->prepare($query);
        $titre = $tag->getTitre();
        $stmt->bindParam(":titre", $titre);
        $stmt->execute();
    }
    public function checkIfExists($titre)
    {
        $query = "select * from tags where titre = '$titre' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAlltags()
    {
        $tags = [];
        $query = "select * from tags";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $tags[] = new Tag($row["titre"]);
        }
        return $tags = [];
    }
}
