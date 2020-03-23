<?php
require 'model/post.php';
require 'model/comment.php';
class HomeController
{
    public function index()
    {
        $posts = new post();
        /**appel de la fonction lastpost pour l'affichage de la page d'accueil
         */
        $post = $posts->getLastPost();

        require 'view/home/index.php';

    }
}
