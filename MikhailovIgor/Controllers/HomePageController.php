<?php
namespace MikhailovIgor\Controllers;

class HomePageController {
    public function __construct()
    {
    }

    /*public static function getInstance()
    {
        if (self::$classLoader === null) {
            self::$classLoader = new self();
        }

        return self::$classLoader;
    }*/

    public function showUrls()
    {
        $routes = require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/Core/configs/router.php");
        foreach ($routes as $key => $controller) {
            if ($key != "/") {
                $url = "http://" . $_SERVER['SERVER_NAME'] . $key;
                echo "<a href=${url}>$key<a></br>";
            }
        }
    }

    public function section(){
        echo "IT IS SECTION";
    }
}