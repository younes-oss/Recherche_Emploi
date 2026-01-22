<?php

namespace App\Controller;

use App\Service\CondidatService;
use App\Config\Database;
use App\Entity\Candidat;
use App\Entity\Role;
use App\Repository\RoleRepository;
class AuthController
{
    private $condidatService;

    public function __construct()
    {
        $this->condidatService = new CondidatService(Database::getConnection());
    }

    public function register()
    {
        if (isset($_POST['role'])) {
            if ($_POST['role'] === 'candidate') {
                $nom = trim($_POST['nomComplet']);
                $email = trim($_POST['email']);
                $motDePasse = trim($_POST['motDePasse']);
                $role = trim($_POST['role']);
                $telephone = trim($_POST['telephone']);
                $salaireAttendu = trim($_POST['salaireAttendu']);

                if (empty($nom) || empty($email) || empty($motDePasse) || empty($role) || empty($telephone) || empty($salaireAttendu)) {
                    echo json_encode(['type' => 'error', 'message' => 'Champs obligatoires']);
                    exit;
                }
                $condidat = new Candidat($nom, $email,  $motDePasse, $telephone, $salaireAttendu);
                $role = (new RoleRepository(Database::getConnection()))->findByRole($role);
                if($role){
                    $condidat->setRole($role);
                }

            } else {

            }
        }
    }
    // public function login()
    // {
    //     $username = trim($_POST['username']);
    //     $password = trim($_POST['password']);

    //     if (!$username || !$password) {
    //         echo json_encode([
    //             'type' => 'error',
    //             'message' => 'Champs obligatoires'
    //         ]);
    //         exit;
    //     }

    //     $user = new User($username, $password);
    //     $res = $this->userService->login($user);

    //     if ($res === null) {
    //         echo json_encode([
    //             'type' => 'error',
    //             'message' => 'Identifiants incorrects'
    //         ]);
    //         exit;
    //     }

    //     if ($res === 'inactive') {
    //         echo json_encode([
    //             'type' => 'error',
    //             'message' => 'Compte non actif'
    //         ]);
    //         exit;
    //     }

    //     $_SESSION['idUser'] = $res->getId();
    //     $_SESSION['nom'] = $res->getNomComplet();
    //     $redirect = '../public/dashboard_user.php';

    //     if (in_array('admine', $res->getRoles())) {
    //         $redirect = '../public/dashboard_admine.php';
    //     }

    //     echo json_encode([
    //         'type' => 'success',
    //         'message' => 'Connexion réussie',
    //         'redirect' => $redirect,
    //         'user' => [
    //             'id' => $res->getId(),
    //             'nom' => $res->getNomComplet(),
    //             'roles' => $res->getRoles()
    //         ]
    //     ]);
    //     exit;
    // }


}

// $_POST = [
//     'role' => 'candidate',
//     'nomComplet' => 'Morad Benaissa',
//     'email' => 'morad@example.com',
//     'motDePasse' => '123456',
//     'telephone' => '0612345678',
//     'salaireAttendu' => '3000'
// ];

// // إنشاء controller
// $authController = new AuthController();

// // من هنا غادي نستعمل register
// $authController->register();

