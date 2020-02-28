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

    public function edit(){
        $url = $_GET['url'];
        $url_split = explode('/',$url);
        $postid = $url_split[2];
        if(!$_SESSION['is_connected']){
            header('Location:'.APP_DIR);
        }
        $posts = new post();
         $list = $posts->getPost($postid);
     
         require('view/post/edit.php');
        }
        public function add(){
            require ('view/post/add.php');
        }


        public function addpost()
        {      
            $url='user/login';  
            if (isset($_POST['submit']) && $_SESSION['is_connected']){
                $post = new post();
                $post->addPost($_POST['titre'],$_POST['contenu']);
                $url = 'admin';
            }
            header('Location:'.APP_DIR.'/'.$url);      
        }

}//creer editpost (cc) 
// idem qu'add pour delet post mais virer submit

