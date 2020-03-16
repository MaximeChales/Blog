<?php
require_once 'model.php';
class comment extends model
{

    /**
     * recuperation des commentaires en fonction de leurs postid 
     */
    public function getComments($postid)
    {
        $data = $this->db->prepare("select * from comment where post_id = :postid");
        $data->execute([':postid' => $postid]);
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    /**
     * Si un commentaire est signalé, alors son status passe à 1 dans la BDD
     */
    public function reportComment($id)
    {
        $data = $this->db->prepare("update `comment` set `status` = 1 where `id` = :id ");
        return $data->execute(array(':id' => $id));
    }

    /**
     * Sauvegarde le commentaire avec chacun des criteres de la BDD
     */
    public function saveComment($pseudo, $comment, $email, $post_id, $title)
    {
        $data = $this->db->prepare("insert into `comment` values(null,:email,:date_add,:post_id,:content,:title,0,:name)");
        return $data->execute(array(
            ':email' => $email,
            'date_add' => date('Y-m-d H:i:s'),
            ':post_id' => $post_id,
            ':content' => $comment,
            ':title' => $title,
            ':name' => $pseudo,
        ));
    }

    public function getReportedComments()
    {
        /**
         * récupere les commentaires signalés dans l'ordre croissant de publications
         */
        $data = $this->db->prepare("select * from comment where status =1 order by date_add asc");
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteComment($id)
    {
        /**
         * supprimme le commentaire en fonction de son id
         */
        $data = $this->db->prepare("delete from `comment` WHERE id = :id");
        return $data->execute(array(
            ':id' => $id,
        ));
    }
}
