<?php
namespace MikhailovIgor\Controllers;

use MikhailovIgor\Shapes\Shape;
use MikhailovIgor\Shapes\Circle;
use MikhailovIgor\Shapes\Rectangle;
use MikhailovIgor\Shapes\Triangle;
use MikhailovIgor\Logger\Logger;

class HomeWork2Controller {
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
        echo "<br>";
    }

    public function showHomeWork()
    {
        $this->showUrls();

        $loggerForShapes = Logger::getInstance($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "\logs\log.txt");
        try {
        $circle = new Circle(5);
        $circlePerimetr = $circle->getPerimetr();
        $circleSpace = $circle->getSpace();
        echo "<b>Круг</b><br>Периметр: " . $circle->getPerimetr() . "<br>";
        echo "Площадь: " . $circle->getSpace() . "<br>";
        $loggerForShapes->createLog("Был создан круг с периметром " . $circlePerimetr . " и площадью " . $circleSpace);
        } catch(Exception $e) {
            echo $e->getMessage() . "<br>";
            $loggerForShapes->createLog($e->getMessage(), "FATAL");
        }
        
        try {
        $triangle = new Triangle(3, 3, 3);
        $trianglePerimetr = $triangle->getPerimetr();
        $triangleSpace = $triangle->getSpace();
        echo "<b>Треугольник</b><br>Периметр: " . $trianglePerimetr . "<br>";
        echo "Площадь: " . $triangleSpace . "<br>";
        $loggerForShapes->createLog("Был создан треугольник с периметром " . $trianglePerimetr . " и площадью " . $triangleSpace);
        } catch(Exception $e) {
            echo $e->getMessage() . "<br>";
            $loggerForShapes->createLog($e->getMessage(), "FATAL");
        }
        
        try {
        $rectangle = new Rectangle(4, 3);
        $rectanglePerimetr = $rectangle->getPerimetr();
        $rectangleSpace = $rectangle->getSpace();
        echo "<b>Прямоугольник</b><br>Периметр: " . $rectanglePerimetr . "<br>";
        echo "Площадь: " . $rectangleSpace . "<br>";
        $loggerForShapes->createLog("Был создан прямоугольник с периметром " . $rectanglePerimetr . " и площадью " . $rectangleSpace);
        } catch(Exception $e) {
            echo $e->getMessage() . "<br>";
            $loggerForShapes->createLog($e->getMessage(), "FATAL");
        }
    }

    public function section(){
        echo "IT IS SECTION";
    }
}