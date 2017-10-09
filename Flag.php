<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 25.09.2017
 * Time: 12:04
 */

class Flag
{
    private $name;
    private $area;
    private $shape;
    private $color;

    /**
     * Flag constructor.
     * @param string $name Specifies the flag's name
     * @param string $color Specifies the flag's color
     */
    function __construct($name, $color)
    {

        $this->name = $name;
        $this->color = $color;

    }

    public static function triangle($name, $color, $a, $b, $c) : Flag {

        $instance = new self($name, $color);
        $instance->setShape("triangular");

        if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {

            if (($a <= 0) || ($b <= 0) || ($c <= 0)) {

                echo "<b>[FLAGS][MATH_ERROR]</b> Triangle sides must be greater than 0!</br>";

                return null;

            }

            $s = ($a + $b + $c)/2;

            $underSqrt = $s*($s-$a)*($s-$b)*($s-$c);

            if ($underSqrt < 0) {

                echo "</br><b>[FLAGS][MATH_ERROR]</b> Invalid triangle side lengths!</br>";

                return null;

            }
            $instance->setArea(round(sqrt($underSqrt),2));

        } else {

            return null;

        }

        return $instance;

    }

    public static function rectangle($name, $color, $a, $b) : Flag {

        $instance = new self($name, $color);
        $instance->setShape("rectangular");

        if (is_numeric($a) && is_numeric($b)) {

            if (($a <= 0) || ($b <= 0)) {

                echo "</br><b>[FLAGS][MATH_ERROR]</b> Rectangle sides must be greater than 0!</br>";

                return null;

            }

            $instance->setArea(round($a*$b,2));

        } else {

            return null;

        }

        return $instance;

    }

    public static function square($name, $color, $a) : Flag {

        $instance = new self($name, $color);
        $instance->setShape("square");

        if (is_numeric($a)) {

            if (($a <= 0)) {

                echo "</br><b>[FLAGS][MATH_ERROR]</b> Square side must be greater than 0!</br>";

                return null;

            }

            $instance->setArea(round($a*$a,2));

        } else {

            return null;

        }

        return $instance;

    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * @param mixed $shape
     */
    public function setShape($shape)
    {
        $this->shape = $shape;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $this->color = $color;
    }


    function __toString() : string {

        return "$this->color $this->shape $this->name, with an area of $this->area m²";

    }
}