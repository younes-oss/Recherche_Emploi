<?php
namespace App\Service;
use App\Repository\TagsRepository;

class TagService{
    private $TagsRepo;
    public function __construct()
    {
        $this->TagsRepo= new tagsRepository();
    }
    public function createTag($tag){
        $titre=$tag->getTitre();
        if(!$this->TagsRepo->checkIfExists($titre)){
          $this->TagsRepo->addTag($tag);
        }else{
            echo "tag déja existe";
        };

    }
}