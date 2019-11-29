<?php 
require_once 'model.php';
class post extends model
{
      public function getPosts() {
     
         $data = $this->db->prepare('select * from post order by date_upd desc');
          $data->execute();
          $result = $data->fetchAll(PDO::FETCH_ASSOC);
        //echo '<pre>';print_r($result);echo '</pre>';
          return $result ;
      }

      public function getPost($id) {
       //TODO: recuperer un post 
        $data = $this->db->prepare('select * from post where id = $id');
         $data->execute();
         $result = $data->fetchAll(PDO::FETCH_ASSOC);
       //echo '<pre>';print_r($result);echo '</pre>';
         return $result ;
     }
}
