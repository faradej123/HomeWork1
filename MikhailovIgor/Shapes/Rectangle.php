<?php
namespace MikhailovIgor\Shapes;

use Exception;

class Rectangle extends Shape 
{
    private $width;
    private $height;
    public function __construct(float $width, float $height)
    {
        if ($this->verifyParameters($width, $height)) {
            $this->width = $width;
            $this->height = $height;
        }
    }

    public function getPerimetr()
    {
        return ($this->width + $this->height)*2;
    }

    public function getSpace()
    {
        return $this->width * $this->height;
    }

    private function verifyParameters($width, $height){
        if ($width < 0 || $height < 0) {
            throw new Exception ("Высота или ширина прямоугольника не может быть равной нулю или меньше!");
        } else {
            return true;
        }
    }
}