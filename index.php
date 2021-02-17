<?php
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Shape.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Circle.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Rectangle.php");
require_once($_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/MikhailovIgor/Shapes/Triangle.php");

use MikhailovIgor\Shapes\Shape;
use MikhailovIgor\Shapes\Circle;
use MikhailovIgor\Shapes\Rectangle;
use MikhailovIgor\Shapes\Triangle;
/*function f1(Shape $shape1, Shape $shape2){
    return $shape1->perimetr();
}*/
try {
$circle = new Circle(5);
echo "<b>Круг</b><br>Периметр: " . $circle->getPerimetr() . "<br>";
echo "Площадь: " . $circle->getSpace() . "<br>";
} catch(Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
$triangle = new Triangle(3, 3, 3);
echo "<b>Треугольник</b><br>Периметр: " . $triangle->getPerimetr() . "<br>";
echo "Площадь: " . $triangle->getSpace() . "<br>";
} catch(Exception $e) {
    echo $e->getMessage() . "<br>";
}

try {
$rectangle = new Rectangle(4, 3);
echo "<b>Прямоугольник</b><br>Периметр: " . $rectangle->getPerimetr() . "<br>";
echo "Площадь: " . $rectangle->getSpace() . "<br>";
} catch(Exception $e) {
    echo $e->getMessage() . "<br>";
}