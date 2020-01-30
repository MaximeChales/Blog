<?php 
require_once 'model.php';
class comment extends model
{
    function getComments($postid){
    $data = $this->db->prepare("select * from comment where post_id = $postid");
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result ;

  }  
  public function reportComment($id){
    $data = $this->db->prepare("update `comment` set `status` = 1 where `id` = :id ");
    return $data->execute(array(':id'=>$id)); 
    
  }
}