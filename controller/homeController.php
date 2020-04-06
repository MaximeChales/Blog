<?php
require APP_DIR.'/model/Post.php';
require APP_DIR.'/model/Comment.php';
class HomeController
{
    public function index()
    {
        $posts = new Post();
        /**appel de la fonction lastpost pour l'affichage de la page d'accueil
         */
        $post = $posts->getLastPost();

        require APP_DIR.'/view/home/index.php';

    }
}
