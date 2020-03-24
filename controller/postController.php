<?php
require 'model/post.php';
require 'model/comment.php';
class PostController
{

    public function index($url = null)
    {
        //TODO faire confirmer par PS
        //On instancie la classe post
        $posts = new post();
        
        //On verifie que le paramètre exite et qu'il n'est pas vide
        if (isset($url[1]) && !empty($url[1])) {
            $list = $posts->getPost($url[1]);

            //On instancie l'objet comment
            $comment = new comment();
            $comments = $comment->getComments($url[1]);
            require 'view/post/view.php';
        } else {
            $list = $posts->getposts();
            if (isset($_SESSION['is_connected']) && $_SESSION['is_connected'] == true) {
                require 'view/post/admin.php';
            } else {
                require 'view/post/index.php';
            }
        }

    }
    /**
     * On récupere le post en fonction de son id ainsi que les commentaires qui y sont associés
     */
    public function view($id)
    {
        $posts = new post();
        $list = $posts->getPost($id);
        if(empty ($list)){
            header('Location:' . APP_DIR.'/view/404.php');
        }
        $comment = new comment();
        $comments = $comment->getComments($id);
        require 'view/post/view.php';
    }

    public function edit()
    {
        /**
         * je récupère l'id du post: si je suis pas admin, je renvoie la personne sur la page d'accueil.
         *  sinon je charge le poste correspondant à l'id
         */
        $url = $_GET['url'];
        $url_split = explode('/', $url);
        $postid = $url_split[2];
        if (!$_SESSION['is_connected']) {
            header('Location:' . APP_DIR);
        }
        $posts = new post();
        $list = $posts->getPost($postid);

        require 'view/post/edit.php';
    }

    public function editPost()
    {
        $url = 'post';

        if (isset($_POST['submit']) && $_SESSION['is_connected']) {
            $post = new post();
            $post->editPost($_POST['post_id'], $_POST['titre'], $_POST['article']);
            $url = 'post';
        }
        header('Location:' . APP_DIR . '/' . $url);
    }

    public function add()
    {
        if (!$_SESSION['is_connected']) {
            header('Location:' . APP_DIR);
        }
        require 'view/post/add.php';
    }

    public function addPost()
    {
        $url = 'post';
        if (isset($_POST['submit']) && $_SESSION['is_connected']) {
            $post = new post();
            $post->addPost($_POST['titre'], $_POST['contenu']);
        }
        header('Location:' . APP_DIR . '/' . $url);
    }

    public function deletePost()
    {

        $redirect = 'post';

        $url = $_GET['url'];
        $url_split = explode('/', $url);
        $postid = $url_split[2];
        if ($_SESSION['is_connected']) {
            $posts = new post();
            $list = $posts->deletePost($postid);
            $redirect = 'post';
        }
        header('Location: ' . APP_DIR . '/' . $redirect);
    }

}
