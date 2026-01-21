<?php

namespace App\Entity;
use App\Entity\Categorie;

class Admin extends Utilisateur

{
    private $categories = [];
    private $tag = [];
    public function __construct(string $name, string $email, string $password)
    {
        parent::__construct($name, $email, $password);
    }
    
    public function addCategorie($titre){
        $cat = new Categorie($titre);
        $this->categories[] = $cat;
        return $cat;
    }

    public function addTag($titre){
        $tag = new Tag($titre);
        $this->tag[] = $tag;
        return $tag;
    }
}
