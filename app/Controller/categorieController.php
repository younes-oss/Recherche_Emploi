<?php

namespace App\Controller;

use App\Service\CategorieService;

class CategorieController
{
    private $CategorieServ;
    public function __construct()
    {
        $this->CategorieServ = new CategorieService();
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
            } else {
                echo $error;
            }
        }
    }
}
