<?php
namespace MikhailovIgor\Controllers;

class HomePageController extends \Core\Controller{
    public function __construct()
    {
    }

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
}