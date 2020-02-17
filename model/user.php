<?php 
class user
{
    public function checkLogin($user, $password){
        //todo verifier login et password (select * for user)
        $data = $this->db->prepare("select * FROM `user` WHERE `nickname` = $user AND `password` = $password");
        $data->execute();
        $result = $data->fetch(PDO::FETCH_ASSOC);
        return true;
     }
    
    }
}