<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controller\OffreController;
use App\Controller\TagController;


if (isset($_GET['action']) && $_GET['action'] === 'getAllTags') {
    $tagController = new TagController();
    $tagController->getAllTags();
} else {
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $controller = new OffreController();
        
       
        $controller->create();
        
    } else {
        echo json_encode(['type' => 'error', 'message' => 'Méthode non autorisée']);
    }
}