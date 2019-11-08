<?php 
require('model/post.php');
class postController
{
    public function index() 
    {
       $posts = new post();
       $list = $posts->getpost();
      require('view/post/index.php');
    }
}

