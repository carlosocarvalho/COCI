<?php

ini_set('display_errors',1);

require 'vendor/autoload.php';

use COC\COCI\Injection;



class Foo{

}


class Bar{
    public $entity;
    function __construct(Foo $entity){

    	$this->entity = $entity;
     
    }
}



$coci = new Injection();

$bar =  $coci->get('Bar');


