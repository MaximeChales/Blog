<?php 
require_once 'model.php';
class comment extends model
{
  public function getComments($postid){
    $data = $this->db->prepare("select * from comment where post_id = $postid");
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result ;

  }  

/*faire la fonction pour envoyer les commentaires sur la bdd

$req = $bdd->prepare('INSERT INTO blog_commentaires (id, name, content, title)
VALUES (:id_billet, :auteur, :commentaire, NOW())');
 
$req->execute(array(
    'id_billet'=> $_POST['billet'],
    'auteur'=> $_POST['auteur'],
    'commentaire'=> $_POST['commentaire'],
 
));*/

}