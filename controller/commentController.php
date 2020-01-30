<?php
require_once 'model/comment.php'; 
class commentController
{
    public function add(){
        require ('view/comment/add.php');
    }
    public function save(){
        print_r($_POST);
    }
    public function report(){
    $result = false;
      $comment_id = 0;
      if(isset($_GET['id']) && is_numeric($_GET ['id'])){
        $comment_id = $_GET['id'];
      }
      if ($comment_id){
          $comment = new comment();
         $result =  $comment->reportComment($comment_id);
      }
      echo (int)$result;
        exit;
    }
}