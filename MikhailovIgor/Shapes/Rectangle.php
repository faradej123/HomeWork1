<?php
namespace MikhailovIgor\Shapes;

use Exception;

class Rectangle extends Shape 
{
    public $width;
    public $height;
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

    protected function verifyParameters($width, $height){
        if ($width < 0 || $height < 0) {
            throw new Exception ("Высота или ширина прямоугольника не может быть равной нулю или меньше!");
        } else {
            return true;
        }
    }
}