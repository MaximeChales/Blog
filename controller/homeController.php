<?php 
require('model/post.php');
require('model/comment.php');
class homeController
{
    public function index() 
    {
        $posts = new post();
        $post = $posts->getLastPost(); 
        $post = $posts->getAllPost();//maxime
        
        require('view/home/index.php');   
    
    }
}

