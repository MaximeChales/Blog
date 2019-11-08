<?php 
require_once 'model.php';
class post extends model
{
      public function getPost() {
     
         $data = $this->db->prepare('select * from post order by date_upd desc');
          $data->execute();
          $result = $data->fetchAll();
        //echo '<pre>';print_r($result);echo '</pre>';
          return $result ;
      }
}
