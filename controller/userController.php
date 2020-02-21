<?php 
require_once ('model/user.php');
class userController
{
  public function login(){
    require ('view/user/login.php');
  }
  public function check(){
     $url='user/login'; 

    if(isset($_POST['connexion'])){
        $user= new user();
        if($user->checkLogin($_POST['login'], $_POST['password'])){
            $url='admin';
        }
      }
    header('Location:'.APP_DIR.'/'.$url);      
  }
}