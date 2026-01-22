<?php
namespace App\Entity;
class UserRole
{
    private $id;
    private $utilisateur;
    private $role;

    public function __construct($utilisateur, $role)
    {
        $this->utilisateur = $utilisateur;
        $this->role = $role;
    }

    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    } 

    public function setRole($role)
    {
        $this->role = $role;
    } 

    public function getUtilisateurId()
    {
        return $this->utilisateur->getId();
    }

    public function getRoleId()
    {
        return $this->role->getId();
    }

    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    public function getRole()
    {
        return $this->role;
    }
}
