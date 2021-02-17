<?php
namespace MikhailovIgor\Shapes;

abstract class Shape 
{
    public function __construct()
    {

    }
    public abstract function getPerimetr();
    public abstract function getSpace();
}