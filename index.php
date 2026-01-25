<?php

require_once "vendor/autoload.php";

use App\router\Router;

$urlDemande = $_SERVER['REQUEST_URI'];
$cheminScript = dirname($_SERVER['SCRIPT_NAME']);
$url = str_replace($cheminScript, '', $urlDemande);
$url = parse_url($url, PHP_URL_PATH);
$url = trim($url, '/');

$routeur = new Router();
$routeur->ajouter('view/auth/login', ['PageController', 'login']);
$routeur->ajouter('view/admine/dashborad', ['PageController', 'dashboradAdmine']);
$routeur->ajouter('view/recruteur/dashboard', ['PageController', 'dashboardRecruteur']);
$routeur->ajouter('view/candidate/dashboard', ['PageController', 'dashboardCandidate']);
$routeur->ajouter('view/auth/register', ['PageController', 'register']);
$routeur->ajouter('view/auth/loginUser', ['AuthController', 'login']);
$routeur->ajouter('view/auth/registerUser', ['AuthController', 'register']);


$routeur->dispatcher($url);