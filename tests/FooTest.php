<?php 

use COC\COCI\Injection;

class Foo{
  
}


class Bar{
     
     /**
      * [$entity description]
      * @var Foo
      */
	 public $entity;
     function __construct(Foo $entity){
      $this->entity = $entity;
     }
}

class FooTests extends PHPUnit_Framework_TestCase{

    

    public function testSuccessInstance(){
           
            $obj = new Injection();
    
           
           $this->assertTrue( (1+1) == 2, 'Successo');
    }


}