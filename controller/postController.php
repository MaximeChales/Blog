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
        if($_SESSION['is_connected'] == true){
            require('view/post/admin.php');  
        }else{
         require('view/post/index.php');   
        }
       }
    
    }
    public function view($id){
        $posts = new post();
         $list = $posts->getPost($id);
          $comment = new comment();
          $comments = $comment->getComments($id);
         require('view/post/view.php');
    }

    public function edit($id){
        if(!$_SESSION['is_connected']){
            header('Location:'.APP_DIR);
        }
        $posts = new post();
         $list = $posts->getPost($id);
         require('view/post/edit.php');
         //TODO: faire un form sur edit.php (page à creer) + creer function edit_submit (equivalent a check) qui permettra d'enrengistrer les données dans la BDD faire
        //TODO: ajouter un form (casi identique a edit mais contenu vide puisque création d'un new content) 
        }
}

