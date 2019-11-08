<?php 
class post
{
      public function getPost() {
         $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
         $data = $db->prepare('select * from post order by date_upd desc');
          $data->execute();
          $result = $data->fetchAll();
        //echo '<pre>';print_r($result);echo '</pre>';
          return $result ;
      }
}
