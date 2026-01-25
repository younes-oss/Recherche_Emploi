<?php

namespace App\Entity;

class Experience
{
    private int $id;
    private $entreprise;
    private $poste;
    private $date;

    private $condidat;

    public function __construct($entreprise, $poste, $date)
    {
        $this->entreprise = $entreprise;
        $this->poste = $poste;
        $this->date = $date;
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

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
}
