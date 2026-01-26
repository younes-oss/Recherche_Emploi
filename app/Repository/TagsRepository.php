<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\Tag;
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

     public function findById(int $id): ?Tag
    {
        $query = "SELECT * FROM tags WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Tag($row['titre'], (int)$row['id']);
    }


    public function getAllTags(){

    $tags = [];

    $sql = "select * from tags";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();

    $reults = $stmt->fetchAll(PDO :: FETCH_ASSOC);

    foreach($reults as $row){
            $tag = new Tag($row['titre']);
            $tag->setId($row['id']);

            $tags[] = $tag;
    }
    return $tags;
    }
}
