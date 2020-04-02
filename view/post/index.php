<?php include_once APP_DIR.'/view/menu.php';?>
<div class="enteteviewpost"><h2> Vous trouverez sur cette page tous les chapitre du récit de Jean Forteroche ! </h2></div>

<div class="wrap" >
    <div class="contentposts">
    <!--View de tous les posts du site. On récupère leurs titre, leurs contenu ainsiq que leurs id.
     On ajoute un submit pour accéder a l'article complet-->
    <?php foreach ($list as $post): ?>

        <div class="content">

        <h2><a href="<?=WWW_DIR?>post/<?=$post['id']?>-<?=$post['decodedtitle']?>" target="_blank"><?=$post['title']?></a></h2>


        <div class="post-content"><?=$post['content']?></div>

        <a  class="submit" href="<?=WWW_DIR?>post/<?=$post['id']?>-<?=$post['decodedtitle']?>" >Lire l'article complet</a>
        </div>

    <?php endforeach?>
    </div>
</div>
<?php include_once APP_DIR.'/view/footer.php';?>