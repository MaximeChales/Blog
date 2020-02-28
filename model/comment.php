<?php 
require_once 'model.php';
class comment extends model
{
    function getComments($postid){
    $data = $this->db->prepare("select * from comment where post_id = :postid");
    $data->execute([':postid'=>$postid]);
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  }  
  public function reportComment($id){
    $data = $this->db->prepare("update `comment` set `status` = 1 where `id` = :id ");
    return $data->execute(array(':id'=>$id)); 
  }
 public function saveComment($pseudo,$comment,$email,$post_id,$title){
  $data = $this->db->prepare("insert into `comment` values(null,:email,:date_add,:post_id,:content,:title,0,:name)");
  return $data->execute(array(
    ':email'=>$email,
    'date_add'=>date('Y-m-d H:i:s'),
    ':post_id'=>$post_id,
    ':content'=>$comment,
    ':title'=>$title,
    ':name'=>$pseudo
  )); 
 }
}