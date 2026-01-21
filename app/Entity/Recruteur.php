<?php

namespace App\Entity;

class Recruteur extends Utilisateur 
{
    private string $companyName;

    public function __construct(string $name, string $email, string $password, string $companyName)
    {
        
        parent::__construct($name, $email, $password);
        $this->companyName = $companyName;
    }

    public function getCompanyName(): string 
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): void 
    {
        $this->companyName = $companyName;
    }
}