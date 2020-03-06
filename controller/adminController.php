<?php 
class adminController
{
    public function index() 
    {  
        if($_SESSION['is_connected']){
        
        require('view/admin/index.php');   
      }
      else {
      header('Location: '.APP_DIR);       
    }
    
    }
}

