<?php
require_once 'model/comment.php'; 
require_once 'model/post.php';
class commentController
{
    public function add(){
        require ('view/comment/add.php');
    }

    public function save(){
     
        if(isset($_POST['submit'])){
          $post = new post();
          $comment = new comment();
          $comment->saveComment($_POST['pseudo'],$_POST['commentaire'],$_POST['email'],$_POST['post_id'],$_POST['title']);
        }
         header('Location:'.APP_DIR.'/post/'.$_POST['post_id'].'-'.$post->getTitle($_POST['post_id']));
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
    
    }

    public function getComments($url = null) 
    {
      $post = new post();
       if (isset ($url [1]) && !empty ($url [1])) {
        $list = $comment->getComments($url [1]);

         $comment = new comment();
         $comments = $comment->getComments($url [1]);
        require('view/post/view.php');
       }
       else{
        $list = $comments->getcomments();
        if($_SESSION['is_connected'] == true){
            require('view/post/admin.php');  
        }else{
         require('view/post/');   
        }
       }
    
    }



}