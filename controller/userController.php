<?php
//On charge le fichier user.php pour pouvoir récuperer la classe model et son extend: user
require_once APP_DIR . '/model/User.php';
class UserController
{

    //Si "$_SESSION['is_connected']" extiste et est vrai alors ça mene vers la page admin. sinon ça ammène sur la page de login
    public function login()
    {
        if (isset($_SESSION['is_connected']) && $_SESSION['is_connected'] == true) {
            header('Location: ' . WWW_DIR . 'Admin');
        }
        require APP_DIR . '/view/user/login.php';
    }

    //Passe "$_SESSION['is_connected']" en false pour déconnecter
    public function logout()
    {
        $_SESSION['is_connected'] = false;
        header('Location: ' . WWW_DIR);
    }

    public function check()
    {
        //Vérifie que les identifiants sont bons avant de refiriger vers la page admin
        $url = 'User/login';
        if (isset($_POST['connexion'])) {
            $user = new User();
            if ($user->checkLogin($_POST['login'], $_POST['password'])) {
                $url = 'Admin';
            }
        }
        header('Location:' . WWW_DIR . $url);
    }
}
