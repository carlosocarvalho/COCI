# COCI
PHP Simple Injection, use classe in project.
[![Latest Stable Version](https://poser.pugx.org/carlosocarvalho/coci/v/stable)](https://packagist.org/packages/carlosocarvalho/coci) [![Total Downloads](https://poser.pugx.org/carlosocarvalho/coci/downloads)](https://packagist.org/packages/carlosocarvalho/coci) [![Latest Unstable Version](https://poser.pugx.org/carlosocarvalho/coci/v/unstable)](https://packagist.org/packages/carlosocarvalho/coci) [![License](https://poser.pugx.org/carlosocarvalho/coci/license)](https://packagist.org/packages/carlosocarvalho/coci)

##Install
**Composer install**
  
      {
         "require":"carlosocarvalho/coci": "1.0.0"
      }
      
##Example use

    <?php
      
      require "vendor/autoload.php";
      
      use COC\COCI\Injection;
      $inj = new Injection;
 
 **Create Classes Injections with Agregration (Person)**  
 
      Class Person(){
         private $person ;
        class function __construct(TypePerson $typePerson){
               $this->person = $typePerson;
         }   
      
      }
      

**Create Classes Injections(TypePerson)**
      
      
      <?php    
      Class TypePerson(){
        private $type;
        setType($type){
          $this->type;
        }
        getType(){
          return $this->type;
        }
      }
        
**Inject Classes Closure**

     <?php 
       $inj->set('TypePerson',function(){
          return new TypePerson();
       })
       
      $inj->set('Person',function() use ($inj){
         return new Person($inj->get('TypePerson'));
       });
  
**Inject Classes By Reflection**

     <?php 
       
       $inj->get('TypePerson');
