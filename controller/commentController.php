<?php
require_once 'model/comment.php';
require_once 'model/post.php';

class commentController
{

/**
 *Appel à la fonction getReportedComments() qui sert à recuperer dles comments qui ont étés signalés
 */

    public function index()
    {
        $comment = new comment();
        $comments = $comment->getReportedComments();
        require 'view/comment/index.php';
    }

 /**
 * précise qu'il nous faut add.php pour l'ajout des comments
 */

    public function add()
    {
        require 'view/comment/add.php';
    }
 /**
 *sauvegarde des comments dans la BDD
 */
    public function save()
    {

        if (isset($_POST['submit'])) {
            $post = new post();
            $comment = new comment();
            $comment->saveComment($_POST['pseudo'], $_POST['commentaire'], $_POST['email'], $_POST['post_id'], $_POST['title']);
        }
        header('Location:' . APP_DIR . '/post/' . $_POST['post_id'] . '-' . $post->getTitle($_POST['post_id']));
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
                require 'view/post/admin.php';
            } else {
                require 'view/post/';
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
        header('Location: ' . APP_DIR . '/' . $redirect);
    }

}
