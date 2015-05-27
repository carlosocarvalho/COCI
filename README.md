# COCI
PHP Simple Injection, use classe in project.

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
