<?php include_once APP_DIR . '/view/menu.php';?>

    <div class="enteteadmin">
        <h2> Gestion des articles </h2>
    </div>

    <div class="wrap">
        <div class="contentposts">

            <!-- On liste ici tous les posts existants avec un foreach on ajoute les options pour éditer et supprimer les commentaires-->

            <?php foreach ($list as $post): ?>

                <div class="content">
                    <div class='entetepost'>
                        <h2><a href="<?=WWW_DIR?>Post/<?=$post['id']?>-<?=$post['decodedtitle']?>" target="_blank"><?=$post['title']?></a></h2>
                        <div class="options">
                            <a class="editer" href="<?=WWW_DIR?>Post/edit/<?=$post['id']?>"><i class="fas fa-pen fa-2x"></i></a>
                            <a class="supprimer" href="<?=WWW_DIR?>Post/deletePost/<?=$post['id']?>"><i class="far fa-trash-alt fa-2x"></i></a>
                        </div>
                    </div>

                    <div class="post-content">
                        <?=$post['content']?>
                    </div>

                    <a class="submit" href="<?=WWW_DIR?>Post/<?=$post['id']?>-<?=$post['decodedtitle']?>">Lire l'article complet</a>
                </div>

                <?php endforeach?>
        </div>
    </div>
<?php include_once APP_DIR . '/view/footer.php';?>