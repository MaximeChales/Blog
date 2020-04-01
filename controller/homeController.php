<?php
require APP_DIR.'/model/post.php';
require APP_DIR.'/model/comment.php';
class HomeController
{
    public function index()
    {
        $posts = new post();
        /**appel de la fonction lastpost pour l'affichage de la page d'accueil
         */
        $post = $posts->getLastPost();

        require APP_DIR.'/view/home/index.php';

    }
}
