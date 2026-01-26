<?php


require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\OffreController;


$_POST = [
    'poste' => 'Développeur PHP',
    'salaire' => '45000',
    'qualifications' => '3 ans d\'expérience en PHP',
    'lieu' => 'Paris',
    'recruteur_id' => 1,  
    'categorie_id' => 1,  
    'tags' => [1, 2]      
];


$_SERVER['REQUEST_METHOD'] = 'POST';


$controller = new OffreController();


$controller->create();
