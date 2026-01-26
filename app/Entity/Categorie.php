<?php

namespace App\Entity;

use JsonSerializable;

class Categorie implements JsonSerializable 
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

    public function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'titre' => $this->titre
        ];
    }
    
}
