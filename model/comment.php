<?php
require_once APP_DIR . '/model/Model.php';

/**
 * Comment
 */
class Comment extends Model
{
    /**
     * recuperation des commentaires en fonction de leurs postid
     *
     * @param  int $postid
     * @return void
     */
    public function getComments($postid)
    {
        $data = $this->db->prepare("SELECT * FROM `comment` WHERE `post_id` = :postid");
        $data->execute([':postid' => $postid]);
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        $data->closeCursor();
        return $result;

    }

    /**
     * Si un commentaire est signalé, alors son status passe à 1 dans la BDD
     *
     * @param  int $id
     * @return void
     */
    public function reportComment($id)
    {
        $data = $this->db->prepare("UPDATE `comment` SET `status` = 1 WHERE `id` = :id ");
        $data->execute([':id' => $id]);
        $data->closeCursor();
    }

    /**
     * cancelReport
     *
     * @param  int $id
     * @return void
     */
    public function cancelReport($id)
    {
        $data = $this->db->prepare("UPDATE `comment` SET `status` = 0 WHERE `id` = :id ");
        $data->execute([':id' => $id]);
        $data->closeCursor();
    }

    /**
     * Sauvegarde le commentaire avec chacun des criteres de la BDD
     *
     * @param  string $pseudo
     * @param  string $comment
     * @param  string $email
     * @param  int $post_id
     * @param  string $title
     * @return void
     */
    public function saveComment($pseudo, $comment, $email, $post_id, $title)
    {
        $data = $this->db->prepare("INSERT INTO `comment` VALUES(NULL,:email,:date_add,:post_id,:content,:title,0,:name)");
        $data->execute(
            [
                ':email' => $email,
                ':date_add' => date('Y-m-d H:i:s'),
                ':post_id' => $post_id,
                ':content' => $comment,
                ':title' => $title,
                ':name' => $pseudo,
            ]
        );
        $data->closeCursor();
    }

    /**
     * récupere les commentaires signalés (dont le status est de 1) dans l'ordre croissant de publications
     *
     * @return void
     */
    public function getReportedComments()
    {
        $data = $this->db->prepare("SELECT * FROM `comment` WHERE `status` = 1 ORDER BY `date_add` ASC");
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        $data->closeCursor();
        return $result;
    }

    /**
     * supprimme le commentaire en fonction de son id
     *
     * @param  int $id
     * @return void
     */
    public function deleteComment($id)
    {
        $data = $this->db->prepare("DELETE FROM `comment` WHERE `id` = :id");
        $data->execute([':id' => $id]);
        $data->closeCursor();
    }
}
