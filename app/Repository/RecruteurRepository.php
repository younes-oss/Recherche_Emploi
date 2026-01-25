<?php

namespace App\Repository;
class RecruteurRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($recruteur)
    {
        $query = "insert into recruteurs (id, nom_entreprise)
        values (:id, :nomEntreprise)";
        $stm = $this->conn->prepare($query);

        $stm->execute([
            ':id' => $recruteur->getId(),
            ':nomEntreprise' => $recruteur->getCompanyName()
        ]);
        return $recruteur;
    }
}
