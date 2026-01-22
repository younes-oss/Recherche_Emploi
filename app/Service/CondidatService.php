<?php
namespace App\Service;
use App\Service\UserService;
use App\Repository\CondidateRepository;
class CondidatService
{
    private $userServ;
    private $condidatRepo;


    public function __construct($conn)
    {
        $this->userServ = new UserService($conn);
        $this->condidatRepo = new CondidateRepository($conn);
    }

    public function register($user)
    {
        $condidat = $this->userServ->register($user);
        if ($condidat) {
            $this->condidatRepo->register($condidat);
            echo json_encode([
                'type' => 'success',
                'message' => 'Inscription réussie',
                'redirect' => '../public/login.php'
            ]);
            exit;
        }
    }


}
