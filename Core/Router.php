<?php
namespace Core;

class Router{

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function register(){
        $routes = require_once ($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/Core/configs/router.php");

        $requestUri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];

        if(isset($routes[$requestUri][$method])){
            $route = $routes[$requestUri][$method];
            $controller = $route["controller"];
            $action = $route["action"];

            $object = new $controller();
            $object->$action();
        }else{
            //TODO: show 404 page
        }
    }

    private function __sleep()
    {

    }

    private function __wakeup()
    {

    }
}