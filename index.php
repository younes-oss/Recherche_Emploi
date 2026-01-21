<?php

require_once "vendor/autoload.php";

use App\router\Router;

$urlDemande = $_SERVER['REQUEST_URI'];
// echo '1 '.$urlDemande.'\n';
// echo "/n";
$cheminScript = dirname($_SERVER['SCRIPT_NAME']);
// echo '2 '.$cheminScript.'\n';
// echo "\n";
$url = str_replace($cheminScript, '', $urlDemande);
// echo '3 '.$url.'\n';
// echo "\n";
$url = parse_url($url, PHP_URL_PATH);
// echo '4 '.$url.'\n';
// echo "\n";
$url = trim($url, '/');
// echo '5 '.$url.'\n';
// echo "\n";

$routeur = new Router();
$routeur->ajouter('register', ['PageController', 'register']);
$routeur->ajouter('login', ['PageController', 'login']);
$routeur->ajouter('view/admine/dashborad', ['PageController', 'dashboradAdmine']);
$routeur->ajouter('view/recruteur/dashboard', ['PageController', 'dashboardRecruteur']);
$routeur->ajouter('view/candidate/dashboard', ['PageController', 'dashboardCandidate']);


try {
    $routeur->dispatcher($url);
} catch (Throwable $erreur) {
    http_response_code(500);
    echo "Erreur serveur";
}
