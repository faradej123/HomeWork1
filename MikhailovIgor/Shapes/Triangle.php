<?php
namespace MikhailovIgor\Shapes;

use Exception;

class Triangle extends Shape 
{
    protected $edgeLength1; 
    protected $edgeLength2;
    protected $edgeLength3;
    
    public function __construct(float $edgeLength1, float $edgeLength2, float $edgeLength3)
    {
        if ($this->verifyParameters($edgeLength1, $edgeLength2, $edgeLength3)) {       
            $this->edgeLength1 = $edgeLength1;
            $this->edgeLength2 = $edgeLength2;
            $this->edgeLength3 = $edgeLength3;
        }
    }
    public function getPerimetr()
    {
        return $this->edgeLength1 + $this->edgeLength2 + $this->edgeLength3;
    }
    public function getSpace()
    {
        $semiPerimetr = $this->getPerimetr() / 2;
        $space = sqrt($semiPerimetr * ($semiPerimetr - $this->edgeLength1) * ($semiPerimetr - $this->edgeLength2) * ($semiPerimetr - $this->edgeLength3));
        return $space;
    }

    protected function verifyParameters($edgeLength1, $edgeLength2, $edgeLength3)
    {
        if ($edgeLength1 + $edgeLength2 > $edgeLength3 && $edgeLength2 + $edgeLength3 > $edgeLength1 && $edgeLength3 + $edgeLength1 > $edgeLength2) {
            return true;
        } else {
            throw new Exception ("Существования треугольника с заданными сторонами - невозможно!");
        }
    }
}