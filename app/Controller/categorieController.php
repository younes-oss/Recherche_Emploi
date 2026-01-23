<?php

namespace App\Controller;

require_once "./vendor/autoload.php";

use App\Service\CategorieService;
use App\Repository\CategoriesRepository;
use App\Entity\Categorie;

class CategorieController
{
    private $CategorieServ;
    private $CategoriesRepository;
    public function __construct()
    {
        $this->CategorieServ = new CategorieService();
        $this->CategoriesRepository = new CategoriesRepository();
    }
    public function inputsCheck()
    {
        if (isset($_POST["ajouter"])) {
            
            $error = '';
            $titre = trim($_POST["categorieName"] ?? '');
            if (empty($titre)) $error = "Nom requis.";
            if (empty($error)) {
                $categorie = new Categorie($titre);
                $this->CategorieServ->createCategorie($categorie);
                $error = '';
                require "View/admine/dashborad.php";
            } else {
                echo $error;
            }
        }
    }
    public function getAllCategories()
    {
        $categories = $this->CategoriesRepository->getAllcategories();
        echo json_encode($categories);
    }
}
