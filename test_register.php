<?php

// require_once 'path/to/Database.php';
// require_once 'path/to/Entity/Candidat.php';
// require_once 'path/to/Entity/Role.php';
// require_once 'path/to/Repository/RoleRepository.php';
// require_once 'path/to/Service/CondidatService.php';
// require_once 'path/to/Controller/AuthController.php';

require_once  __DIR__ .'app/Controller/AuthController.php';

$_POST = [
    'role' => 'candidate',
    'nomComplet' => 'Morad Benaissa',
    'email' => 'morad@example.com',
    'motDePasse' => '123456',
    'telephone' => '0612345678',
    'salaireAttendu' => '3000'
];


$authController = new AuthController();


$authController->register();

