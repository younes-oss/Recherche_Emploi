<?php
namespace App\Service;
use App\Service\UserService;
use App\Repository\RecruteurRepository;
class RecruteurService
{
    private $userServ;
    private $recruteurRepo;


    public function __construct($conn)
    {
        $this->userServ = new UserService($conn);
        $this->recruteurRepo = new RecruteurRepository($conn);
    }

    public function register($user)
    {
        $recruteur = $this->userServ->register($user);
        if ($recruteur) {
            $this->recruteurRepo->register($recruteur);
            echo json_encode([
                'type' => 'success',
                'message' => 'Inscription réussie',
                'redirect' => 'http://localhost/Recherche_Emploi/view/auth/login'
            ]);
            return true;
        }
        return false;
    }
}
