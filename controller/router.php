<?php
class Router
{
    public function route()
    {

        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            $controller = $url[0] . "Controller";
            $filename = APP_DIR . '/controller/' . $controller . '.php';
            if (file_exists($filename)) {
                require_once $filename;
            } else {
                require APP_DIR . '/view/404.php';
                exit;
            }
            if (!class_exists($controller)) {
                require APP_DIR . '/view/404.php';
                exit;
            }

            $control = new $controller();

            /**
             * On éclate l'url pour en récuperer les parametres (au dessus le controlleur et plus bas l'id)
             */
            if (isset($url[1]) && !empty($url[1])) {
                $method = explode('-', $url[1]);
                $m = $method[0];

                if (is_numeric($m)) {
                    $control->view($m);
                } else {

                    if (!method_exists($control, $m)) {
                        require APP_DIR . '/view/404.php';
                        exit; 
                    }
                    $control->$m();
                }

            } else {

                $control->index($url);
            }
        } else {
            $controller = "HomeController";
            require_once APP_DIR . '/controller/' . $controller . '.php';
            $control = new $controller();
            $control->index();
        }
    }
}
