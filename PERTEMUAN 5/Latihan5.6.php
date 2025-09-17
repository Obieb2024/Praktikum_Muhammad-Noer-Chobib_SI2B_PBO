<?php

class Base {
    // The final keyword prevents this method from being overridden.
    final function display() {
        echo "\nBase class function declared final!";
    }

    function demo() {
        echo "\nBase class function!";
    }
}

class Derived extends Base {
    // This is a valid override because 'demo()' is not final in the Base class.
    function demo() {
        echo "\nDerived class function!";
    }
    
    // The display() method is not overridden here to avoid the fatal error.
}

$ob = new Base;
$ob->demo();
$ob->display();

$ob2 = new Derived;
$ob2->demo();
$ob2->display();

?>