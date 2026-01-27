<?php

namespace App\Service;

use App\Entity\Offre;
use App\Entity\Recruteur;
use App\Entity\Categorie;
use App\Repository\OffreRepository;

class OffreService
{
    private OffreRepository $offreRepository;

    public function __construct()
    {
        $this->offreRepository = new OffreRepository();

    }

    
    public function createOffre(string $poste, Recruteur $recruteur, Categorie $categorie, $salaire, $qualifications, $lieu, array $tags = []): bool
    {
        
        if (empty($poste) || empty($lieu)) {
            return false;
        }

        if ($recruteur === null) {
        return false;
    }
        
        $offre = new Offre($poste, $salaire, $qualifications, $lieu);
        $offre->setRecruteur($recruteur);
        $offre->setCategorie($categorie);
        
        // Ajout des tags
        foreach ($tags as $tag) {
            $offre->addTag($tag);
        }

        
        return $this->offreRepository->create($offre);
    }

    
     
    public function getAllActiveOffres(): array
    {
        
        return $this->offreRepository->findAll();
    }

    public function getOffreById(int $id): ?Offre
    {
        return $this->offreRepository->findById($id);
    }

    
    public function getOffresByRecruteur(Recruteur $recruteur): array
    {
        return $this->offreRepository->findByRecruteur($recruteur);
    }

    
    public function updateOffre(Offre $offre): bool
    {
        return $this->offreRepository->update($offre);
    }

    
    public function archiveOffre(int $id): bool
    {
        return $this->offreRepository->archive($id);
    }

    
    public function deleteOffre(int $id): bool
    {
        return $this->offreRepository->delete($id);
    }
}
