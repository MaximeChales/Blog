<?php
require_once APP_DIR . '/model/Comment.php';
require_once APP_DIR . '/model/Post.php';

class CommentController
{

/**
 *Appel à la fonction getReportedComments() qui sert à recuperer les comments qui ont étés signalés et redirige vers la
 *page des commentaires SI ON
 */

    public function index()
    {
        $comment = new Comment();
        $comments = $comment->getReportedComments();
        if ($_SESSION['is_connected']) {
            require APP_DIR . '/view/comment/index.php';
        } else {
            header('Location:' . WWW_DIR);
        }

    }

    /**
     * précise qu'il nous faut add.php pour l'ajout des comments
     */

    public function add()
    {
        require APP_DIR . '/view/comment/add.php';
    }
    /**
     *sauvegarde des comments dans la BDD
     */
    public function save()
    {

        if (isset($_POST['submit'])) {
            $post = new Post();
            $comment = new Comment();
            if (empty($_POST['email'])) {
                $_SESSION['error'] = 'Veuillez insérer votre adresse e-mail.';
            } elseif (!preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $_POST['email'])) {
                $_SESSION['error'] = 'Veuillez insérer une adresse e-mail valide.';
            } elseif (empty($_POST['pseudo'])) {
                $_SESSION['error'] = 'Veuillez insérer votre nom.';
            } elseif (empty($_POST['title'])) {
                $_SESSION['error'] = 'Veuillez insérer votre titre.';
            } elseif (empty($_POST['commentaire'])) {
                $_SESSION['error'] = 'Veuillez insérer votre message.';
            } elseif (empty($_POST['post_id'])) {
                $_SESSION['error'] = 'Merci de ne pas modifier le code.';
            } else {
                $comment->saveComment($_POST['pseudo'], $_POST['commentaire'], $_POST['email'], $_POST['post_id'], $_POST['title']);
            }

        }
        header('Location:' . WWW_DIR . 'Post/' . $_POST['post_id'] . '-' . $post->getTitle($_POST['post_id']));
    }

    public function report()
    {
        $comment_id = 0;
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $comment_id = $_GET['id'];
        }
        if ($comment_id) {
            $comment = new Comment();
            $comment->reportComment($comment_id);
        }
    }

    public function cancelReport()
    {
        $redirect = '';

        $url = $_GET['url'];
        $url_split = explode('/', $url);
        $commentid = $url_split[2];
        if ($_SESSION['is_connected']) {
            $comment = new Comment();
            $comment->cancelReport($commentid);
            $redirect = 'Comment';
        }
        header('Location: ' . WWW_DIR . $redirect);
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
            $comment = new Comment();
            $comment->deleteComment($commentid);
            $redirect = 'Comment';
        }
        header('Location: ' . WWW_DIR . $redirect);
    }

}
