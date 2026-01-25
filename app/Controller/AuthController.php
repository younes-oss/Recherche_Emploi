<?php

namespace App\Controller;

use App\Service\CondidatService;
use App\Service\RecruteurService;
use App\Service\UserService;
use App\Config\Database;
use App\Entity\Candidat;
use App\Entity\Utilisateur;
use App\Entity\Recruteur;
use App\Entity\UserRole;
use App\Entity\Competence;
use App\Entity\Role;
use App\Repository\RoleRepository;
use App\Repository\CompetenceRepository;
use App\Repository\ExperienceRepository;
use App\Repository\UserRoleRepository;
class AuthController
{
    private $condidatService;
    private $recruteurService;
    private $userService;

    public function __construct()
    {
        $this->condidatService = new CondidatService(Database::getConnection());
        $this->recruteurService = new RecruteurService(Database::getConnection());
        $this->userService = new UserService(Database::getConnection());
    }

    public function register()
    {

        if (!isset($_POST['role'])) {
            echo json_encode([
                'type' => 'error',
                'message' => 'Tous les champs candidat sont obligatoires'
            ]);
            exit;
        }

        if ($_POST['role'] === 'candidat') {
            $nom = trim($_POST['nomComplet']);
            $email = trim($_POST['email']);
            $motDePasse = trim($_POST['motDePasse']);
            $role = trim($_POST['role']);
            $telephone = trim($_POST['telephone']);
            $salaireAttendu = trim($_POST['salaireAttendu']);
            $skills = json_decode($_POST['skills'], true);
            $experiences = json_decode($_POST['experiences'], true);

            if (!$nom || !$email || !$motDePasse || !$telephone || !$salaireAttendu) {
                echo json_encode([
                    'type' => 'error',
                    'message' => 'Tous les champs candidat sont obligatoires'
                ]);
                exit;
            }
            $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
            $condidat = new Candidat($nom, $email, $motDePasse, $telephone, $salaireAttendu);
            $role = (new RoleRepository(Database::getConnection()))->findByRole($role);

            if ($role) {
                $condidat->setRole($role);

                if ($this->condidatService->register($condidat)) {
                    if (!empty($skills)) {
                        $competenceRepo = new CompetenceRepository(Database::getConnection());
                        foreach ($skills as $skill) {
                            $comptence = $condidat->addCompetence($skill);
                            $competenceRepo->add($comptence);
                        }
                    }

                    if (!empty($experiences)) {
                        $experienceRepo = new ExperienceRepository(Database::getConnection());
                        foreach ($experiences as $exp) {
                            $experience = $condidat->addExperience(
                                $exp['entreprise'],
                                $exp['poste'],
                                $exp['date']
                            );
                            $experienceRepo->addExperience($experience);
                        }
                    }

                    $userRole = new UserRole($condidat, $role);
                    (new UserRoleRepository(Database::getConnection()))->addUserRole($userRole);
                }
            }
        }

        if ($_POST['role'] === 'recruteur') {
            $nom = trim($_POST['nomComplet']);
            $email = trim($_POST['email']);
            $motDePasse = trim($_POST['motDePasse']);
            $role = trim($_POST['role']);
            $nomEntreprise = trim($_POST['nomEntreprise']);

            if (!$nom || !$email || !$motDePasse || !$nomEntreprise) {
                echo json_encode([
                    'type' => 'error',
                    'message' => 'Tous les champs recruteur sont obligatoires'
                ]);
                exit;
            }
            $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
            $recruteur = new Recruteur($nom, $email, $motDePasse, $nomEntreprise);
            $role = (new RoleRepository(Database::getConnection()))->findByRole($role);

            if ($role) {
                $recruteur->setRole($role);

                if ($this->recruteurService->register($recruteur)) {
                    $userRole = new UserRole($recruteur, $role);
                    (new UserRoleRepository(Database::getConnection()))->addUserRole($userRole);
                }
            }
        }
    }

    public function login()
    {
        $email = trim($_POST['identifiant']);
        $motDePasse = trim($_POST['motDePasse']);

        if (!$email || !$motDePasse) {
            echo json_encode([
                'type' => 'error',
                'message' => 'Tous les champs sont obligatoires'
            ]);
            exit;
        }

        $user = new Utilisateur('', $email, $motDePasse);
        $user = $this->userService->login($user);

        if ($user === null) {
            echo json_encode([
                'type' => 'error',
                'message' => 'Identifiants incorrects'
            ]);
            exit;
        }

        $_SESSION['idUser'] = $user->getId();
        $_SESSION['nom'] = $user->getName();
        // $redirect = '../public/dashboard_user.php';

        if ($user->getRole()->getTitle() === 'candidat') {
            $redirect = 'http://localhost/Recherche_Emploi/view/candidate/dashboard';
        }

        if ($user->getRole()->getTitle() === 'admin') {
            $redirect = 'http://localhost/Recherche_Emploi/view/admine/dashborad';
        }

        if ($user->getRole()->getTitle() === 'recruteur') {
            $redirect = 'http://localhost/Recherche_Emploi/view/recruteur/dashboard';
        }

        echo json_encode([
            'type' => 'success',
            'message' => 'Connexion réussie',
            'redirect' => $redirect,
            'user' => [
                'id' => $user->getId(),
                'nom' => $user->getName(),
                'role' => $user->getRole()->getTitle()
            ]
        ]);
        exit;
    }
}


