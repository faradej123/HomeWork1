<?php
namespace Core;

class Controller{

    private $data = [];
    private $menu = [];

    public function __construct()
    {
    }

    public function loadModel($alias, $title)
    {
        $model = "\\Mikhailovigor\\models" . $title;
        $this->$alias = new $model();
    }

    public function data($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    public function display($path)
    {
        //$path = \Core\Configs\Consts::DOCUMENT_ROOT . $this->getPathToViews() . "\\views\\" . $viewTitle . ".php";
        if (file_exists($path)) {
            \extract($this->data);
            require_once($path);
        }
    }

    public function getMenu()
    {
        $routes = require($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/Core/configs/router.php");
        foreach ($routes as $key => $controller) {
            if ($key != "/") {
                $url = "http://" . $_SERVER['SERVER_NAME'] . $key;
                //echo "<a href=${url}>$key<a></br>";
                $this->menu += [$key => $url];
            }
        }
        //echo "<br>";
    }

    public function getPathToViews()
    {
        $b = __NAMESPACE__;
        $a = stristr(__NAMESPACE__, '\\', true);
        return stristr(__NAMESPACE__, '\\', true);
    }
}