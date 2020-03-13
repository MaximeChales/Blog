<?php 
require_once ('model/user.php');
class userController
{
  public function login(){
    if(isset($_SESSION['is_connected']) && $_SESSION['is_connected'] == true){
      header('Location: '.APP_DIR.'/admin');
    }
    require ('view/user/login.php');
  }

  public function logout(){
    $_SESSION['is_connected'] = false;
    header('Location: '.APP_DIR.'/');
  }

  public function check(){

    $url ='user/login';
    if(isset($_POST['connexion'])){
        $user= new user();
        if($user->checkLogin($_POST['login'], $_POST['password'])){
            $url='admin';
        }
      }
    header('Location:'.APP_DIR.'/'.$url);      
  }
}