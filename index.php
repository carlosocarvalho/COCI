<?php

ini_set('display_errors',1);

require 'vendor/autoload.php';

use COC\COCI\Injection;



class Foo{

}


class Bar{

    function __construct(Foo $obj){

    }
}



$coci = new Injection();


var_dump($coci->get('Bar'));

