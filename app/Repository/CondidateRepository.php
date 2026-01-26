<?php

namespace App\Repository;
class CondidateRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($condidat)
    {
        $query = "insert into candidats (id, telephone, salaire_attendu)
        values (:id, :telephone, :salaire_attendu)";
        $stm = $this->conn->prepare($query);

        $stm->execute([
            ':id' => $condidat->getId(),
            ':telephone' => $condidat->getPhone(),
            ':salaire_attendu' => $condidat->getExpectedSalary(),
            
        ]);
        return $condidat;
    }

    

}
