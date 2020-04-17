<?php
require_once APP_DIR . '/model/Model.php';
class User extends Model
{
    public function checkLogin($user, $password)
    {
        $data = $this->db->prepare("SELECT * FROM `user` WHERE `nickname` = :user");
        $data->execute([':user' => $user]);
        $result = $data->fetch(PDO::FETCH_ASSOC);
        $data->closeCursor();
        return $result;
    }

}
