<?php

namespace App\Entity;

class Offre
{
    private $id;
    private $poste;
    private $salaire;
    private $qualifications;
    private $lieu;
    private ?Recruteur $recruteur = null;
    private Categorie $categorie;
    private int $status = 1;
    private $createdAt;
    private array $tags = [];

    public function __construct(
        $poste,
        $salaire,
        $qualifications,
        $lieu
    ) {
        $this->poste = $poste;
        $this->salaire = $salaire;
        $this->qualifications = $qualifications;
        $this->lieu = $lieu;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPoste()
    {
        return $this->poste;
    }
    public function getSalaire()
    {
        return $this->salaire;
    }
    public function getQualifications()
    {
        return $this->qualifications;
    }
    public function getLieu()
    {
        return $this->lieu;
    }
    public function getRecruteur()
    {
        return $this->recruteur;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function getTags()
    {
        return $this->tags;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }
    public function setPoste($poste)
    {
        $this->poste = $poste;
    }
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }
    public function setQualifications($qualifications): void
    {
        $this->qualifications = $qualifications;
    }
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }
    public function setRecruteur(Recruteur $recruteur)
    {
        $this->recruteur = $recruteur;
    }
    public function setCategorie(Categorie $categorie)
    {
        $this->categorie = $categorie;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function addTag(Tag $tag): void
    {
        $this->tags[] = $tag;
    }

}
