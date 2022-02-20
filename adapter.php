<?php
    /**
     * Внешняя библиотека:
     */

class CircleAreaLib
{
   public function getCircleArea(int $diagonal)
   {
       $area = (M_PI * ($diagonal**2))/4;

       return $area;
   }
}

class SquareAreaLib
{
   public function getSquareArea(float $diagonal)
   {
       $area = ($diagonal**2)/2;

       return $area;
   }
}

    /**
     * Имеющиеся интерфейсы:
     */

interface ISquare
{
    public function squareArea(int $sideSquare);
}

interface ICircle
{
    public function circleArea(int $circumference);
}

class SquareArea implements ISquare {

    public function squareArea(int $sideSquare)
    {
        // TODO: Implement squareArea() method.
    }
}

class CircleArea implements ICircle {

    public function circleArea(int $circumference)
    {
        // TODO: Implement circleArea() method.
    }
}

/**
 * Адаптер вычисления площади круга через длину окружности:
 */
class AdapterAreaCircle {

    public $areaCircle;

    public function __construct()
    {
        return $this->areaCircle = new CircleAreaLib();
    }

    public function adapterCircleArea(int $circumference)
    {
        $diagonal = $circumference / M_PI;
        $this->areaCircle->getCircleArea($diagonal);

    }

}

/**
 * Адаптер вычисления площади квадрата через его сторону:
 */
class AdapterAreaSquare {

    public $areaSquare;

    public function __construct()
    {
        return $this->areaSquare = new SquareAreaLib();
    }

    public function adapterSquareArea(int $sideSquare)
    {
        $diagonal = sqrt(2) * $sideSquare;
        $square = $this->areaSquare->getSquareArea($diagonal);
        return $square;

    }

}
/**
 * Вычисления площади круга через длину окружности:
 */
$circumference = 5;
$areaCircle = new AdapterAreaCircle();
$areaCircle->adapterCircleArea($circumference);

/**
 * Вычисления площади квадрата через его сторону:
 */
$sideSquare = 5;
$areaSquare = new AdapterAreaSquare();
$$areaSquare->adapterSquareArea($sideSquare);


