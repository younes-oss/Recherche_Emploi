<?php
class ExperienceRepository {
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addExperience($experience): void {
        $query = "insert into experiences
                (candidat_id, entreprise, poste, date_debut, date_fin)
                values (:candidat_id, :entreprise, :poste, :date_debut, :date_fin)";

        $stm = $this->conn->prepare($query);
        $stm->execute([
            ':candidat_id' => $experience->getId(),
            ':entreprise'  => $experience->getEntreprise(),
            ':poste'       => $experience->getPoste(),
            ':date_debut'  => $experience->getDateDebut(),
            ':date_fin'    => $experience->getDateFin()
        ]);

        $experience->setId($this->conn->lastInsertId());
        return $experience;
    }
}
