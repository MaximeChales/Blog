<?php 
require('model/post.php');
require('model/comment.php');
class homeController
{
    public function index() 
    {
        $posts = new post();
        $post = $posts->getLastPost(); 
    
        
        require('view/home/index.php');   
    
    }
}
