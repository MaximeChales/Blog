<?php
class Router
{
    public function route()
    {
        
       /* print_r ($_GET);
        exit;*/

        if (isset ($_GET['url']) && !empty($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            $controller = $url[0] . "Controller";
            $filename =  APP_DIR.'/controller/'. $controller.'.php';
            if (file_exists($filename)) { 
                require_once $filename ;
            } 
                else {
                    header('Location:' .APP_DIR.'/view/404.php');
            }
            if (!class_exists($controller)) {
                header('Location:' .APP_DIR.'/view/404.php');
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

                    if (!method_exists($control, $m)) {
                        header('Location:' .APP_DIR. '/view/404.php');
                    }
                    $control->$m();
                }

            } else {

                $control->index($url);
            }
        } else {
            $controller = "HomeController";
            require_once APP_DIR.'/controller/' . $controller . '.php';
            $control = new $controller();
            $control->index();
        }
    }
}
