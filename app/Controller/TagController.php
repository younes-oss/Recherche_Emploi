<?php

namespace App\Controller;

use App\Service\TagService;

class TagController
{
    private $TagServ;
    public function __construct()
    {
        $this->TagServ = new TagService();
    }
    public function inputsCheck()
    {
        if (isset($_POST["ajouterTag"])) {
            $error = '';
            $titre = trim($_POST["TagName"] ?? '');
            if (empty($titre)) $error = "Nom requis.";
            if (empty($error)) {
                $tag = new Tag($titre);
                $this->TagServ->createTag($tag);
                $error = '';
            } else {
                echo $error;
            }
        }
    }
}