<?php
require_once APP_DIR . '/model/Model.php';
class Post extends Model
{

    /**
     * Récupération des titres dans la BDD
     *
     * @param  int $id
     * @return void
     */
    public function getTitle($id)
    {
        $data = $this->db->prepare("SELECT title FROM `post` WHERE id = :id");
        $data->execute([':id' => $id]);
        $result = $data->fetch(PDO::FETCH_ASSOC);
        $data->closeCursor();
        return $result['title'];
    }
    /**
     * Récupération de tous les postes dans la BDD
     *
     * @return void
     */

    public function getPosts()
    {

        $data = $this->db->prepare("SELECT * FROM `post` ORDER BY date_add ");

        $data->execute();
        $result = $data->fetchAll();
        foreach ($result as $key => $post) {
            //recuperation resultat et les replacer par un underscore en allant cherche le title
            $result[$key]['decodedtitle'] = str_replace(' ', "_", $post['title']);
        }
        $data->closeCursor();
        return $result;
    }

    /**
     * Récupération des postes dans la BDD mais individuellement cette fois
     *
     * @param  mixed $id
     * @return void
     */
    public function getPost($id)
    {
        //
        $data = $this->db->prepare("SELECT * FROM `post` WHERE id = :id");
        $data->execute([':id' => $id]);
        $result = $data->fetch(PDO::FETCH_ASSOC);
        $data->closeCursor();
        return $result;
    }
    /**
     * Permet de récuperer le dernier poste mis à jour (pour ensuite l'afficher sur la page d'accueil)
     *
     * @return void
     */
    public function getLastPost()
    {
        $data = $this->db->prepare("SELECT * FROM `post` ORDER BY date_upd desc limit 1");
        $data->execute();
        $result = $data->fetch(PDO::FETCH_ASSOC);
        $data->closeCursor();
        return $result;
    }

    public function addPost($title, $content)
    {
        // Ajoute un poste en inserant des données associés à celles de la bdd
        $data = $this->db->prepare("INSERT INTO `post` VALUES (null,1,:title,:content,:date_add,:date_upd)");
        $data->execute([
            ':title' => $title,
            ':date_add' => date('Y-m-d H:i:s'),
            ':content' => $content,
            ':date_upd' => date('Y-m-d H:i:s'),
        ]);
        $data->closeCursor();
    }

    /**
     * Supprime les données associés à un id dans la table post de la bdd
     *
     * @param  int $id
     * @return void
     */
    public function deletePost($id)
    {
        $data = $this->db->prepare("DELETE FROM `post` WHERE id = :id");
        $data->execute([
            ':id' => $id,
        ]);
        $data->closeCursor();
    }

    /**
     * Modifie les données associés à un id dans la table post de la bdd
     *
     * @param  int $id
     * @param  string $title
     * @param  string $content
     * @return void
     */
    public function editPost($id, $title, $content)
    {
        //
        $data = $this->db->prepare("UPDATE `post` SET title = :title, content = :content, date_upd = :date_upd
      where id = :id");
        $data->execute([
            ':id' => $id,
            ':title' => $title,
            ':content' => $content,
            ':date_upd' => date('Y-m-d H:i:s'),
        ]);
        $data->closeCursor();
    }

}
