<?php

namespace App\Controller;

use App\Service\TagService;
use App\Entity\Tag;
use App\Repository\TagsRepository;

class TagController
{

    private TagsRepository $tagRepo;
    private $TagServ;
    public function __construct()
    {
        $this->TagServ = new TagService();
        $this->tagRepo = new TagsRepository();
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


    
    
    public function getAllTags(){
        $tags = $this->tagRepo->getAllTags();
        
        $ArrayTags = [];
        
        foreach($tags as $tag){
            $ArrayTags[] = [
                'id' => $tag->getId(),
                'titre' => $tag->getTitre()
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($ArrayTags);
    }

}