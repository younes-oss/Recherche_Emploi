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
        $query = "insert into candidats (telephone, salaire_attendu)
        values (:telephone, :salaire_attendu)";
        $stm = $this->conn->prepare($query);

        $stm->execute([
            ':telephone' => $condidat->getTelephone(),
            ':salaire_attendu' => $condidat->getExpectedSalary(),
            
        ]);
        return $condidat;
    }

    

}
