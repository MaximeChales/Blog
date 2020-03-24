<?php
class Router
{
    public function route()
    {

        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            $controller = $url[0] . "Controller";
            require_once 'controller/' . $controller . '.php';
            if( !class_exists ($controller)){
                header('Location:' . APP_DIR.'/view/404.php');
               }
      
            $control = new $controller();

            /**
             * On vérifie dans l'url que l'on a bien récuperer l'id en paramètre.
             * Si oui, alors ...
             */
            //TODO

            if (isset($url[1]) && !empty($url[1])) {
                $method = explode('-', $url[1]);
                $m = $method[0];


                if (is_numeric($m)) {
                    $control->view($m);
                } else {
                    
                    if( !method_exists ($control , $m )){
                    header('Location:' .APP_DIR.'/view/404.php');
                    }
                    $control->$m();
                }

            } else {

                $control->index($url);
            }
        } else {
            $controller = "homeController";
            require_once 'controller/' . $controller . '.php';
            $control = new $controller();
            $control->index();
        }
    }
}
