<?php 
require_once 'model.php';
class post extends model
{
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
       //TODO: recuperer un post 
        $data = $this->db->prepare("select * from post where id = $id");
         $data->execute();
         $result = $data->fetch(PDO::FETCH_ASSOC);
       //echo '<pre>';print_r($result);echo '</pre>';
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
     //maxime
}
