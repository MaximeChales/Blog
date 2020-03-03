<?php 
require_once 'model.php';
class post extends model
{
      public function getTitle($id){
        $data = $this->db->prepare("select title from post where id = :id");
         $data->execute([':id'=>$id]);
         $result = $data->fetch(PDO::FETCH_ASSOC);
         return $result['title'] ;
      }
      public function getPosts() {
        
         $data = $this->db->prepare("select * from post order by date_add ");
        
          $data->execute();
          $result = $data->fetchAll();
      foreach ($result as $key => $post){
        //recuperation resultat et les replacer par un underscore en allant cherche le title
          $result[$key] ['decodedtitle'] = str_replace(' ', "_",$post['title'] );
      }
          return $result ;
      }

      public function getPost($id) {
        $data = $this->db->prepare("select * from post where id = :id");
         $data->execute([':id'=>$id]);
         $result = $data->fetch(PDO::FETCH_ASSOC);
       
         return $result ;
     }
     public function getLastPost(){
      $data = $this->db->prepare("select * from post order by date_upd desc limit 1");
      $data->execute();
      $result = $data->fetch(PDO::FETCH_ASSOC);
      return $result ;
     }

     public function getAllPost(){
      $data = $this->db->prepare("select * from post order by date_upd desc limit 6");
      $data->execute();
      $result = $data->fetch(PDO::FETCH_ASSOC);
      return $result ;
     }

     public function addPost($title,$content){ 
      $data = $this->db->prepare("insert into `post` values(null,1,:title,:content,:date_add,:date_upd)");
      return $data->execute(array(
        ':title'=>$title,
        ':date_add'=>date('Y-m-d H:i:s'),
        ':content'=>$content,
        ':date_upd'=>date('Y-m-d H:i:s')
      ));
     }
     //TODO CC add (besoin postid)

     public function deletePost($id){ 
      $data = $this->db->prepare("delete from `post` WHERE id = :id");
      return $data->execute(array(
        ':id'=>$id,

      ));
     }

    
}
