<?php

require_once 'vendor/autoload.php';

use App\Controller\AuthController;

// simulate post data
// $_POST = [
//     'nomComplet' => 'badr badr',
//     'email' => 'morad@morad.com',
//     'motDePasse' => '123456',
//     'role' => 'candidat',
//     'telephone' => '000000000',
//     'salaireAttendu' => '6000',
//     'skills' => json_encode(['php', 'mysql', 'javascript']),
//     'experiences' => json_encode([
//         [
//             'entreprise' => 'YouCode',
//             'poste' => 'Développeur',
//             'date' => '2022 - 2024'
//         ]
//     ])
// ];

// $controller = new AuthController();
// $controller->register();


$_POST = [
    'role' => 'recruteur',
    'nomComplet' => 'Morad HR',
    'email' => 'moradgghh@company.com',
    'motDePasse' => '123456',
    'nomEntreprise' => 'YouCode'
];

$controller = new AuthController();
$controller->register();

