<?php

namespace App\Entity;
use App\Entity\Experience;
use App\Entity\Competence;
class Candidat extends Utilisateur
{
    private $phone;
    private $expectedSalary;
    private $experiences = [];
    private $competences = [];

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

    public function addExperience($entreprise, $poste, $date)
    {
        $exp = new Experience($entreprise, $poste, $date);
        $exp->setCondidat($this);
        $this->experiences[] = $exp;
        return $exp;
    }

    public function addCompetence($titre)
    {
        $comp = new Competence($titre);
        $comp->setCondidat($this);
        $this->competences[] = $comp;
        return $comp;
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
