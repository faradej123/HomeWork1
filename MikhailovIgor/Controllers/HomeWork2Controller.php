<?php
namespace MikhailovIgor\Controllers;

use MikhailovIgor\Shapes\Shape;
use MikhailovIgor\Shapes\Circle;
use MikhailovIgor\Shapes\Rectangle;
use MikhailovIgor\Shapes\Triangle;
use MikhailovIgor\Logger\Logger;
use Core\Configs\Consts;

class HomeWork2Controller extends \Core\Controller{
    public function __construct()
    {
    }

    public function showHomeWork()
    {
        $this->getMenu();

        $loggerForShapes = Logger::getInstance($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "\logs\log.txt");
        try {
            $circle = new Circle(5);
            $circlePerimetr = $circle->getPerimetr();
            $circleSpace = $circle->getSpace();
            $loggerForShapes->createLog("Был создан круг с периметром " . $circlePerimetr . " и площадью " . $circleSpace);
        } catch(Exception $e) {
            echo $e->getMessage() . "<br>";
            $loggerForShapes->createLog($e->getMessage(), "FATAL");
        }

        $this->data("circlePerimetr", $circlePerimetr);
        $this->data("circleSpace", $circleSpace);

        try {
            $triangle = new Triangle(3, 3, 3);
            $trianglePerimetr = $triangle->getPerimetr();
            $triangleSpace = $triangle->getSpace();
            $loggerForShapes->createLog("Был создан треугольник с периметром " . $trianglePerimetr . " и площадью " . $triangleSpace);
        } catch(Exception $e) {
            echo $e->getMessage() . "<br>";
            $loggerForShapes->createLog($e->getMessage(), "FATAL");
        }

        $this->data("trianglePerimetr", $trianglePerimetr);
        $this->data("triangleSpace", $triangleSpace);

        try {
            $rectangle = new Rectangle(4, 3);
            $rectanglePerimetr = $rectangle->getPerimetr();
            $rectangleSpace = $rectangle->getSpace();
            $loggerForShapes->createLog("Был создан прямоугольник с периметром " . $rectanglePerimetr . " и площадью " . $rectangleSpace);
        } catch(Exception $e) {
            echo $e->getMessage() . "<br>";
            $loggerForShapes->createLog($e->getMessage(), "FATAL");
        }

        $this->data("rectanglePerimetr", $rectanglePerimetr);
        $this->data("rectangleSpace", $rectangleSpace);

        
        $this->data("template", Consts::DOCUMENT_ROOT . "\\MikhailovIgor\\Views\\HomeWork2.php");

        $this->display(Consts::DOCUMENT_ROOT . "MikhailovIgor\\Views\\index.php");
    }
}