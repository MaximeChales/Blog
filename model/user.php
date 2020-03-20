<?php
require_once 'model.php';
class user extends model
{
    public function checkLogin($user, $password)
    {

        /* Cryptage du MDP  

        echo password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
        exit;*/

        $_SESSION['is_connected'] = false;
        $data = $this->db->prepare("select * FROM `user` WHERE `nickname` = :user");
        $data->execute([':user' => $user]);
        $result = $data->fetch(PDO::FETCH_ASSOC);

        if ($result) {
           // BCRYPT  
            if (password_verify($password, $result['password'])) {
                if (password_needs_rehash($password, PASSWORD_DEFAULT, ['cost' => 12])) {
                    $data = $this->db->prepare("update `user` set password = :password WHERE `id` = :id");
                    $data->execute([':id' => $result['id'], ':password' => password_hash($password, PASSWORD_DEFAULT, ['cost' => 12])]);
                }
                $_SESSION['is_connected'] = true;
                return true;
            }

        }
        return false;
    }

}
