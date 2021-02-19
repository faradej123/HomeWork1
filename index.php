<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/Core/ClassLoader.php");

ClassLoader::getInstance()->register();
Router::getInstance()->register();

/*require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Shape.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Circle.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Rectangle.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Triangle.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Logger/Logger.php");*/

/*use MikhailovIgor\Shapes\Shape;
use MikhailovIgor\Shapes\Circle;
use MikhailovIgor\Shapes\Rectangle;
use MikhailovIgor\Shapes\Triangle;
use MikhailovIgor\Logger\Logger;

$loggerForShapes = new Logger("C:\OpenServer\domains\localhost\logs\log.txt");
try {
$circle = new Circle(-5);
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
}*/