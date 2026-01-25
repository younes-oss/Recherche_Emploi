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

    public function login($user)
    {
        $data = $this->userRepo->findByEmail($user->getEmail());

        if (!$data) {
            return false;
        }

        if (!password_verify($user->getPassword(), $data['mot_de_passe'])) {
            return false;
        }

        $user->setId($data['id']);
        $user->setName($data['nom']);

        $role = $this->userRepo->getRoleByUserId($user);
        $user->setRole($role);

        return $user;
    }

}
