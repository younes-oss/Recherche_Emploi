<?php

namespace App\Controller;

use App\Service\OffreService;
use App\Repository\RecruteurRepository;
use App\Repository\CategoriesRepository;
use App\Repository\TagsRepository;


class OffreController
{
     private OffreService $offreService;
    private RecruteurRepository $recruteurRepo;
    private CategoriesRepository $categorieRepo;
    private TagsRepository $tagRepo;
    

    public function __construct()
    {
        $this->offreService = new OffreService();
        $this->recruteurRepo = new RecruteurRepository;
        $this->categorieRepo = new CategoriesRepository();
        $this->tagRepo = new TagsRepository();
        

    }

    
    public function create()
    {
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo "Méthode non autorisée.";
            return;
        }

        
        $poste = $_POST['poste'] ;
        $salaire = $_POST['salaire'] ;
        $qualifications = $_POST['qualifications'];
        $lieu = $_POST['lieu'] ?? '';
        $recruteurId = (int)($_POST['recruteur_id']);
        $categorieId = (int)($_POST['categorie_id']);
        $tagsIds = $_POST['tags'] ?? []; 

        
        if (empty($poste) || empty($lieu) || $recruteurId <= 0 || $categorieId <= 0) {
            echo json_encode(['type' => 'error', 'message' => 'Veuillez remplir tous les champs obligatoires.']);
            return;
        }

        $recruteur = $this->recruteurRepo->findById($recruteurId);
        $categorie = $this->categorieRepo->findById($categorieId);

        if (!$recruteur) {
            echo json_encode(['type' => 'error', 'message' => 'Recruteur introuvable.']);
            return;
        }

        if (!$categorie) {
            echo json_encode(['type' => 'error', 'message' => 'Catégorie introuvable.']);
            return;
        }

        
        $tags = [];
        if (!empty($tagsIds)) {
            foreach ($tagsIds as $tagId) {
                $tag = $this->tagRepo->findById($tagId);
                if ($tag) {
                    $tags[] = $tag;
                }
            }
        }

        $success = $this->offreService->createOffre(
            $poste,
            $recruteur,
            $categorie,
            $salaire,
            $qualifications,
            $lieu,
            $tags
        );

        if ($success) {
            echo json_encode(['type' => 'success', 'message' => 'Offre créée avec succès !']);
        } else {
            echo json_encode(['type' => 'error', 'message' => 'Erreur lors de la création de l\'offre.']);
        }
    }
}