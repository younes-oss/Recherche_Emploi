<?php

namespace App\router;

class Router
{
    private $routes = [];

    // Ajouter une route
    public function ajouter($chemin, $callback)
    {
        $this->routes[$chemin] = $callback;
    }

    // Dispatcher / gérer la route
    public function dispatcher($uri)
    {
        if (!isset($this->routes[$uri])) {
            http_response_code(404);
            echo "404 - Page non trouvée";
            return;
        }

        list($controller, $methode) = $this->routes[$uri];

        $nomClasse = "App\\Controller\\" . $controller;

        if (!class_exists($nomClasse)) {
            http_response_code(500);
            echo "Controller introuvable";
            return;
        }

        $objet = new $nomClasse();

        if (!method_exists($objet, $methode)) {
            http_response_code(500);
            echo "Méthode introuvable";
            return;
        }

        $objet->$methode();
    }
}
