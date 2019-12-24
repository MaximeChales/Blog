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
}