<?php 
require('model/post.php');
class postController
{
    public function index($url = null) 
    {
       $posts = new post();
       if (isset ($url[1])) {
        $list = $posts->getpost($url[1]);
        require('view/post/view.php');
       }
       else{
        $list = $posts->getposts();
      require('view/post/index.php');   
       }
     
    }
}

