<?php
namespace App\Service;
use App\Repository\UserRepository;
class UserService
{
    private $userRepo;


    public function __construct($conn)
    {
        $this->userRepo = new UserRepository($conn);
    }

    public function register($user)
    {
        if ($this->userRepo->findByEmail($user->getEmail())) {
            echo json_encode(['type' => 'error', 'message' => 'Email déjà existant']);
            return null;
        }

        return $this->userRepo->register($user);
    }
}
