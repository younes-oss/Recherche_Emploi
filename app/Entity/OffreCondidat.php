<?php

namespace App\Entity;

class OffreCondidat
{
    private $id ;
    private Offre $offre;
    private Candidat $candidat;
    private $appliedAt ;

    public function __construct(Offre $offre, Candidat $candidat,$appliedAt=null)
    {
        $this->offre = $offre;
        $this->candidat = $candidat;
        $this->appliedAt = $appliedAt;

    }

    public function getId() { return $this->id; }
    public function getOffre() { return $this->offre; }
    public function getCandidat() { return $this->candidat; }
   
    public function getAppliedAt() { return $this->appliedAt; }

    public function setId( $id) { $this->id = $id; }
    public function setOffre(Offre $offre){ $this->offre = $offre; }
    public function setCandidat(Candidat $candidat) { $this->candidat = $candidat; }
    public function setAppliedAt(?string $appliedAt) { $this->appliedAt = $appliedAt; }
}
