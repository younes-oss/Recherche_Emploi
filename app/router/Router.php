<?php

namespace App\router;
require_once "vendor/autoload.php";


class Router
{
    private $routes = [];

    public function ajouter($path, $callBack)
    {
        $this->routes[$path] = $callBack;
    }

    public function dispatcher($uri)
    {
        // $res = array_key_exists($uri, $this->routes);
        // echo  $this->routes[$uri][0]."test";
 
        // var_dump($uri);
       
        // echo json_encode($this->routes);

        if (array_key_exists($uri, $this->routes)) {
            $action = $this->routes[$uri];

            $controller = $action[0];
            $method = $action[1];

            // echo $controller . $method;
            $className = "App\\Controller\\".$controller;
            $obj = new $className();

            $obj->$method();

        } else {
            http_response_code(404);
            echo "this file not found";
        }
    }
}