<?php
require APP_DIR . '/model/Post.php';
require APP_DIR . '/model/Comment.php';
class PostController
{

    public function index($url = null)
    {

        //On instancie la classe post
        $posts = new Post();

        /**
         * On verifie que l'id' existe et qu'il n'est pas vide. Dans ce cas,
         * dans ce cas, on appelle la methode getPosts avec l'id correspondant.
         */
        if (isset($url[1]) && !empty($url[1])) {
            $list = $posts->getPost($url[1]);

            /**
             * On instancie l'objet comment
             * On appelle la methode getcomments avec pour paramettre l'id du post
             * TODO
             * */
            $comment = new Comment();
            $comments = $comment->getComments($url[1]);
            require APP_DIR . '/view/post/view.php';
        } else {
            $list = $posts->getposts();
            if (isset($_SESSION['is_connected']) && $_SESSION['is_connected'] == true) {
                require APP_DIR . '/view/post/admin.php';
            } else {
                require APP_DIR . '/view/post/index.php';
            }
        }

    }
    /**
     * On récupere le post en fonction de son id ainsi que les commentaires qui y sont associés
     */
    public function view($id)
    {
        $posts = new Post();
        $list = $posts->getPost($id);
        if (empty($list)) {
            header('Location:' . WWW_DIR . '/view/404.php');
        }
        $errormessage='';
        if (isset($_SESSION['error']) && !empty ($_SESSION['error'])){
            $errormessage = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        $comment = new Comment();
        $comments = $comment->getComments($id);
        require APP_DIR . '/view/post/view.php';
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
            header('Location:' . WWW_DIR);
        }
        $posts = new Post();
        //On instancie la classe post puis, on appelle la methode getPost avec pour parametres post_id.
        //On précise que l'on a besoin de edit.php (qui est la vue)

        $list = $posts->getPost($postid);
        require APP_DIR . '/view/post/edit.php';
    }

    public function editPost()
    {
        $url = 'Post';

        if (isset($_POST['submit']) && $_SESSION['is_connected']) {
            $post = new Post();
            //On instancie la classe post puis, on appelle la methode editPost avec pour parametres $_POST['post_id'], $_POST['titre'] et $_POST['article'
            $post->editPost($_POST['post_id'], $_POST['titre'], $_POST['article']);
            $url = 'Post';
        }
        header('Location:' . WWW_DIR . $url);
    }

    public function add()
    {
        if (!$_SESSION['is_connected']) {
            header('Location:' . WWW_DIR);
        }
        require APP_DIR . '/view/post/add.php';
    }

    public function addPost()
    {

        $url = 'Post';
        if (isset($_POST['submit']) && $_SESSION['is_connected']) {
            $post = new Post();
            //On instancie la classe post puis, on appelle la methode addPost avec pour parametres ($_POST['titre'] et $_POST['contenu']
            $post->addPost($_POST['titre'], $_POST['contenu']);
        }
        header('Location:' . WWW_DIR . $url);
    } 
 

    public function deletePost()
    {

        $redirect = 'Post';

        $url = $_GET['url'];
        $url_split = explode('/', $url);
        $postid = $url_split[2];
        if ($_SESSION['is_connected']) {
            //On instancie la classe post puis, on appelle la methode deletePost avec pour parametre postid
            $posts = new Post();
            $list = $posts->deletePost($postid);
            $redirect = 'Post';
        }
        header('Location: ' . WWW_DIR . $redirect);
    }

}
