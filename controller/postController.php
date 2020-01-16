<?php 
require('model/post.php');
require('model/comment.php');
class postController
{
    public function index($url = null) 
    {
       $posts = new post();
       if (isset ($url [1]) && !empty ($url [1])) {
        $list = $posts->getPost($url [1]);

         $comment = new comment();
         $comments = $comment->getComments($url [1]);
        require('view/post/view.php');
       }
       else{
        $list = $posts->getposts();
        require('view/post/index.php');   
       }
     
    }
    public function view($id){
        $posts = new post();
     
         $list = $posts->getPost($id);
 
          $comment = new comment();
          $comments = $comment->getComments($id);
         require('view/post/view.php');
    }
}

