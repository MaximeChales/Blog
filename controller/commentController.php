<?php
require_once APP_DIR.'/model/comment.php';
require_once APP_DIR.'/model/post.php';

class CommentController
{

/**
 *Appel à la fonction getReportedComments() qui sert à recuperer les comments qui ont étés signalés et redirige vers la 
 *page des commentaires SI ON
 */

    public function index()
    {
        $comment = new comment();
        $comments = $comment->getReportedComments();
        if ($_SESSION['is_connected']) {
        require APP_DIR.'/view/comment/index.php';
        }

       else{
           header('Location:' . WWW_DIR );
       }  
        
    }

    /**
     * précise qu'il nous faut add.php pour l'ajout des comments
     */

    public function add()
    {
        require APP_DIR.'/view/comment/add.php';
    }
    /**
     *sauvegarde des comments dans la BDD
     */
    public function save()
    {

        if (isset($_POST['submit'])) {
            $post = new post();
            $comment = new comment();
            //On verifie que les inputs ne sont pas vides avant d'envoyer le commentaire à la BDD.
            if (!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['title']) && !empty($_POST['commentaire']) && !empty($_POST['post_id'])) {
                $variable = $_POST['email'];
                if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $variable ) )
                {

   
                $comment->saveComment($_POST['pseudo'], $_POST['commentaire'], $_POST['email'], $_POST['post_id'], $_POST['title']);
            
            }
            
        } 

            //TODO creer un message d'erreur en cas d'input vides
        }
        header('Location:' . WWW_DIR . '/post/' . $_POST['post_id'] . '-' . $post->getTitle($_POST['post_id']));
    }

    public function report()
    {
        $result = false;
        $comment_id = 0;
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $comment_id = $_GET['id'];
        }
        if ($comment_id) {
            $comment = new comment();
            $result = $comment->reportComment($comment_id);
        }

    }
    /**
     * recuperation des commentaires signalés:
     */
    public function getAllComments()
    {
        $post = new post();
        if (isset($url[1]) && !empty($url[1])) {
            $list = $comment->getAllComments($url[1]);

            $comment = new comment();
            $comments = $comment->getAllComments($url[1]);

        } else {
            $list = $comments->getReportedComments();
            if ($_SESSION['is_connected'] == true) {
                require APP_DIR.'/view/post/admin.php';
            } else {
                require APP_DIR.'/view/post/';
            }
        }

    }

    /**
     * supression des commentaires signalés:
     */

    public function deleteComment()
    {

        $redirect = '';

        $url = $_GET['url'];
        $url_split = explode('/', $url);
        $commentid = $url_split[2];
        if ($_SESSION['is_connected']) {
            $comment = new comment();
            $list = $comment->deleteComment($commentid);
            $redirect = 'comment';
        }
        header('Location: ' . WWW_DIR . '/' . $redirect);
    }

}



