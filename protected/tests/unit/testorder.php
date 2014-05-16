<?php 
      require_once('order.php');
           

  class OrdersTest extends PHPUnit_Framework_TestCase {  
   
        
             function test_check_form() 
       
     { //проверка e-mail на наличие @
            $m = new Orders('Vladimir', 'Chemerilov',' '); 
          
            $this->assertFalse($m->check_form());  
        
            $m = new Orders('Vladimir', 'Chemerilov', 'snales11@mail.ru'); 
        
           $this->assertTrue($m->check_form()); 
                   
       //проверка name 
            $m = new Orders('  ', 'Chemerilov', 'snales11@mail.ru'); 
            $this->assertFalse($m->check_form());        
          
            $m = new Orders('Vladimir', 'Chemerilov', 'snales11@mail.ru'); 
            $this->assertTrue($m->check_form());     
               
       //проверка fname 
            $m = new Orders('Vladimir', ' ', 'snales11@mail.ru'); 
            $this->assertFalse($m->check_form());        
        
            $m = new Orders('Vladimir', 'Chemerilov', 'snales11@mail.ru'); 
            $this->assertTrue($m->check_form());  
            
       //проверка на нужное количество символов в строке
            $m = new Orders('Vlad', 'Chemerilov', 'snales11@mail.ru'); 
            $this->assertFalse($m->check_form());
            
            $m = new Orders('Vladimir', 'Chem', 'snales11@mail.ru'); 
            $this->assertFalse($m->check_form());
            
            $m = new Orders('Vladimir', 'Chemerilov', 'sna@'); 
            $this->assertFalse($m->check_form());      
        } 
    } 
?>