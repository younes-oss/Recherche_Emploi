<?php

namespace App\Entity;

class Experience
{
    private int $id;
    private $entreprise;
    private $poste;
    private $dateDebut;
    private $dateFin;
    private $condidat;

    public function __construct($entreprise, $poste, $dateDebut, $dateFin)
    {
        $this->entreprise = $entreprise;
        $this->poste = $poste;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    public function getEntreprise()
    {
        return $this->entreprise;
    }
    public function getCondidat()
    {
        return $this->condidat;
    }

    public function setCondidat($condidat)
    {
        $this->condidat = $condidat;
    }
    public function getPoste()
    {
        return $this->poste;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
}
