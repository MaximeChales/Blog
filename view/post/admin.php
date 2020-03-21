<?php include_once './view/menu.php';?>

<div class="enteteadmin"><h2> Gestion des articles </h2></div>

<div class="wrap" >
    <div class="contentposts">

    <!-- On liste ici tous les posts existants avec un foreach on ajoute les options pour éditer et supprimer les commentaires-->

    <?php foreach ($list as $post): ?>

        <div class="content">

        <h2><a href="<?=APP_DIR?>/post/<?=$post['id']?>-<?=$post['decodedtitle']?>" target="_blank"><?=$post['title']?></a>
        <div class="options">
        <a class="editer" href="<?=APP_DIR?>/post/edit/<?=$post['id']?>"><i class="fas fa-pen"></i></a>
        &nbsp;&nbsp;
        <a class="supprimer" href="<?=APP_DIR?>/post/deletePost/<?=$post['id']?>"><i class="far fa-trash-alt"></i></a>
        </div>
        </h2>
        <div class="post-content"><?=$post['content']?></div>

        <a  class="submit" href="<?=APP_DIR?>/post/<?=$post['id']?>-<?=$post['decodedtitle']?>" >Lire l'article complet</a>
        </div>

    <?php endforeach?>
    </div>
</div>
<?php include_once './view/footer.php';?>