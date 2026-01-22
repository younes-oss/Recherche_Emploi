<?php

namespace App\Entity;
use App\Entity\Experience;
class Candidat extends Utilisateur
{
    private $phone;
    private $expectedSalary;
    private $experiences = [];

    public function __construct(
        $name,
        $email,
        $password,
        $phone,
        $expectedSalary
    ) {
        parent::__construct($name, $email, $password);

        $this->phone = $phone;
        $this->expectedSalary = $expectedSalary;
    }

    public function addExperience($entreprise, $poste, $dateDebut, $dateFin)
    {
        $exp = new Experience($entreprise, $poste, $dateDebut, $dateFin);
        $exp->setCondidat($this);
        $this->experiences[] = $exp;
        return $exp;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getExpectedSalary()
    {
        return $this->expectedSalary;
    }

    public function setExpectedSalary($expectedSalary)
    {
        $this->expectedSalary = $expectedSalary;
    }
}
