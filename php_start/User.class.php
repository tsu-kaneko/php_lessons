<?php

namespace Dotinstall\Lib;

interface sayHi{
  public function sayHi();
}
interface sayHello{
  public function sayHello();
}

class User implements sayHi, sayHello{
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  public function sayHi(){
    echo "hi!, i am $this->name!";
  }
  public function sayHello(){
    echo "hello!, i am $this->name!";
  }
}

