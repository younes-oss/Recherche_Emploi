<?php

namespace App\Entity;

class CompetenceCondidat
{
    private $id;
    private $competence;
    private $candidat;

    public function __construct($candidat, $competence)
    {
        $this->candidat = $candidat;
        $this->competence = $competence;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCompetence()
    {
        return $this->competence;
    }
    public function getCandidat()
    {
        return $this->candidat;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setCompetence($competence)
    {
        $this->competence = $competence;
    }
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;
    }
}
