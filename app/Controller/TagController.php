<?php

namespace App\Controller;

require_once "./vendor/autoload.php";

use App\Service\TagService;
use App\Repository\TagsRepository;

use App\Entity\Tag;

class TagController
{
    private $TagServ;
    private $TagsRepository;
    public function __construct()
    {
        $this->TagServ = new TagService();
        $this->TagsRepository = new TagsRepository();
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
                require "View/admine/dashborad.php";
                $error = '';
            } else {
                echo $error;
            }
        }
    }
    public function getAllTags()
    {
        $tags = $this->TagsRepository->getAlltags();
        echo json_encode($tags);

    }
}
