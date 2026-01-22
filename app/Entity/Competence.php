<?php

namespace App\Entity;

class Competence
{
    private $id ;
    private string $titre;

    public function __construct($titre)
    {
        $this->titre = $titre;
    }

    public function getId() { return $this->id; }
    public function getTitre() { return $this->titre; }
    

    public function setId($id) { $this->id = $id; }
    public function setTitre($titre) { $this->titre = $titre; }
    
}
