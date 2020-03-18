<?php
require_once 'model.php';
class post extends model
{
    //récupération des titres dans la BDD
    public function getTitle($id)
    {
        $data = $this->db->prepare("select title from post where id = :id");
        $data->execute([':id' => $id]);
        $result = $data->fetch(PDO::FETCH_ASSOC);
        return $result['title'];
    }
    public function getPosts()
    {
   //récupération de tous les postes dans la BDD
        $data = $this->db->prepare("select * from post order by date_add ");

        $data->execute();
        $result = $data->fetchAll();
        foreach ($result as $key => $post) {
            //recuperation resultat et les replacer par un underscore en allant cherche le title
            $result[$key]['decodedtitle'] = str_replace(' ', "_", $post['title']);
        }
        return $result;
    }

    public function getPost($id)
    {
           //récupération des postes dans la BDD mais individuellement cette fois
        $data = $this->db->prepare("select * from post where id = :id");
        $data->execute([':id' => $id]);
        $result = $data->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function getLastPost()
    {
        //permet de récuperer le dernier poste mis à jour (pour ensuite l'afficher sur la page d'accueil)
        $data = $this->db->prepare("select * from post order by date_upd desc limit 1");
        $data->execute();
        $result = $data->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addPost($title, $content)
    {
        // Ajoute un poste en inserant des données associés à celles de la bdd
        $data = $this->db->prepare("insert into `post` values (null,1,:title,:content,:date_add,:date_upd)");
        return $data->execute(array(
            ':title' => $title,
            ':date_add' => date('Y-m-d H:i:s'),
            ':content' => $content,
            ':date_upd' => date('Y-m-d H:i:s'),
        ));
    }


    public function deletePost($id)
    {
        //Supprime les données associés à un id dans la table post de la bdd
        $data = $this->db->prepare("delete from `post` WHERE id = :id");
        return $data->execute(array(
            ':id' => $id,
        ));
    }

    public function editPost($id, $title, $content)
    {
         //Modifie les données associés à un id dans la table post de la bdd
        $data = $this->db->prepare("update `post` set title = :title, content = :content, date_upd = :date_upd
      where id = :id");
        return $data->execute(array(
            ':id' => $id,
            ':title' => $title,
            ':content' => $content,
            ':date_upd' => date('Y-m-d H:i:s'),
        ));
    }

}
