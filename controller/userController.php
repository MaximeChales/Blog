<?php
require_once 'model/user.php';
class userController
{

    //Si "$_SESSION['is_connected']" extiste et est vrai alors ça mene vers la page admin. sinon ça ammène sur la page de login
    public function login()
    {
        if (isset($_SESSION['is_connected']) && $_SESSION['is_connected'] == true) {
            header('Location: ' . APP_DIR . '/admin');
        }
        require 'view/user/login.php';
    }


    //Passe "$_SESSION['is_connected']" en false pour déconnecter 
    public function logout()
    {
        $_SESSION['is_connected'] = false;
        header('Location: ' . APP_DIR . '/');
    }

    public function check()
    {
        //Vérifie que les identifiants sont bons avant de refiriger vers la page admin
        $url = 'user/login';
        if (isset($_POST['connexion'])) {
            $user = new user();
            if ($user->checkLogin($_POST['login'], $_POST['password'])) {
                $url = 'admin';
            }
        }
        header('Location:' . APP_DIR . '/' . $url);
    }
}
