<?php

namespace App\Entity;
use JsonSerializable ;

class Tag implements JsonSerializable 
{
    private ?int $id = null;
    private string $titre;

    public function __construct(string $titre)
    {
        $this->titre = $titre;
    }

    public function getId(): ?int { return $this->id; }
    public function getTitre(): string { return $this->titre; }

    public function setId(?int $id): void { $this->id = $id; }
    public function setTitre(string $titre): void { $this->titre = $titre; }
    public function jsonSerialize(): mixed {
        return [
            'id' => $this->id,
            'titre' => $this->titre
        ];
    }
}
