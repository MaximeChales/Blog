<?php
require_once APP_DIR . '/model/Model.php';
class User extends Model
{
    public function checkLogin($user, $password)
    {

        $_SESSION['is_connected'] = false;
        $data = $this->db->prepare("select * FROM `user` WHERE `nickname` = :user");
        $data->execute([':user' => $user]);
        $result = $data->fetch(PDO::FETCH_ASSOC);
        $data->closeCursor();

        if ($result) {
            // utilisation de BCRYPT et plus principalement PASSWORD_DEFAULT pour hacher et crypter le MDP.
            //Password rehash permet de rehacher le mdp si le cryptage n'est pas conforme.
            if (password_verify($password, $result['password'])) {
                if (password_needs_rehash($password, PASSWORD_DEFAULT, ['cost' => 12])) {
                    $data = $this->db->prepare("update `user` set password = :password WHERE `id` = :id");
                    $data->execute([':id' => $result['id'], ':password' => password_hash($password, PASSWORD_DEFAULT, ['cost' => 12])]);
                }
                $_SESSION['is_connected'] = true;
                $data->closeCursor();
                return true;
            }
        }
        return false;
    }

}
