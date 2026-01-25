<?php

namespace App\Repository;

class CompetenceRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function add($competence)
    {
        $query = "INSERT INTO competences (titre, id_candidat)
                  VALUES (:titre, :id_candidat)";

        $stm = $this->conn->prepare($query);

        $stm->execute([
            ':titre' => $competence->getTitre(),
            ':id_candidat' => $competence->getCondidat()->getId(),
        ]);

        return $competence;
    }

    public function findByCandidat($idCandidat)
    {
        $query = "SELECT * FROM competences WHERE id_candidat = :id_candidat";
        $stm = $this->conn->prepare($query);
        $stm->execute([
            ':id_candidat' => $idCandidat
        ]);

        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $query = "DELETE FROM competences WHERE id = :id";
        $stm = $this->conn->prepare($query);
        return $stm->execute([
            ':id' => $id
        ]);
    }
}
