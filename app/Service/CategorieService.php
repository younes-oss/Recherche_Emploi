<?php
namespace App\Service;
use App\Repository\CategoriesRepository;

class CategorieService{
    private $categoriesRepo;
    public function __construct()
    {
        $this->categoriesRepo= new CategoriesRepository();
    }
    public function createCategorie($categorie){
        $titre=$categorie->getTitre();
        if(!$this->categoriesRepo->checkIfExists($titre)){
          $this->categoriesRepo->addCategorie($categorie);
        }else{
            echo "categorie déja existée";
        };

    }
}