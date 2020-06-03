<?php

namespace OurApplication\Controller;

class PriceController
{
    private static $instance;

    /**
     * @return mixed
     * self points to the class in which it is written.
     * So, if your getInstance method is in a class name MyClass, the following line :
     * self::$_instance = new self();
     * Will do the same as :
     * self::$_instance = new MyClass();
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function showPrice()
    {
        echo "<br/>Price is 20 Taka<br/>";
    }
    /*static function showPrice()
    {
        echo "<br/>Price is 20 Taka<br/>";
    }*/
}