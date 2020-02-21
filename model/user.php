<?php
require_once 'model.php';
class user extends model
{
    public function checkLogin($user, $password){
        $_SESSION['is_connected'] = false;
        //todo verifier login et password (select * for user)
        $data = $this->db->prepare("select * FROM `user` WHERE `nickname` = :user AND `password` = :password");
        $data->execute([':user'=>$user,':password'=>$password]);
        $result = $data->fetch(PDO::FETCH_ASSOC);
        if($result){
            $_SESSION['is_connected'] = true;
           return true;
        }
        return false;
     }

    //TODO: remplacer le $ de  par :comme fait pour user et password convertir les $user en :user (voir execute)
    }
