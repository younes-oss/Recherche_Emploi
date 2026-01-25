<?php
namespace App\Repository;
class ExperienceRepository {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addExperience($experience){
        $query = "insert into experiences
                (candidat_id, entreprise, poste, date)
                values (:candidat_id, :entreprise, :poste, :date)";

        $stm = $this->conn->prepare($query);
        $stm->execute([
            ':candidat_id' => $experience->getCondidat()->getId(),
            ':entreprise'  => $experience->getEntreprise(),
            ':poste'       => $experience->getPoste(),
            ':date'  => $experience->getDate(),
        ]);

        $experience->setId($this->conn->lastInsertId());
        return $experience;
    }
}
