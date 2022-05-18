<?php
namespace yse;

class Sample
{
    // member variable
    private $name;
    private $age;

    // constructor
    public function __construct()
    {
        $this->name = "yse";
        $this->age = "10";
    }

    // method
    public function tell()
    {
        echo "my name is {$this->name} .";
        echo " and my age is {$this->age} .";
    }

    // method. return $this
    public function add_age($age)
    {
        $this->age += $age;
        return $this;
    }

    // static method
    public static function factory()
    {
        return new Sample();
    }
}