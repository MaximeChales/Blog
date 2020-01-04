<?php 
class router 
{
    public function route(){
     // print_r($_GET);
      if(isset($_GET['url'])){
        $url=explode ('/',$_GET ['url']); 
        $controller = $url[0]."Controller";
        require_once ('controller/'.$controller.'.php');
        $control = new $controller();
      
        if (isset ($url[1]) && !empty($url[1])){
          $method = explode ('-',$url [1]);
          
          $control->view($method [0]);
        }else{

       

        $control->index($url);
         }
      }else {
        $controller = "homeController";
        require_once ('controller/'.$controller.'.php');
        $control = new $controller();
        $control->index();
      }
    }
}