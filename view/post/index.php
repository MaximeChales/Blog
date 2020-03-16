<?php include_once './view/menu.php';?>
<br><br>
<div class="entete"><h2> Vous trouverez sur cette page tous les chapitre du récit de Jean Forteroche ! </h2></div>
<br>
<div class="wrap" >
    <div class="contentposts">
    <!--View de tous les posts du site. On récupère leurs titre, leurs contenu ainsiq que leurs id.
     On ajoute un submit pour accéder a l'article complet-->
    <?php foreach ($list as $post): ?>

        <div class="content">

        <h2><a href="<?=APP_DIR?>/index.php?url=post/<?=$post['id']?>" target="_blank"><?=$post['title']?></a></h2>


        <div class="post-content"><?=$post['content']?></div>

        <a  class="submit" href="<?=APP_DIR?>/post/<?=$post['id']?>-<?=$post['decodedtitle']?>" >Lire l'article complet</a>
        </div>

    <?php endforeach?>
    </div>
</div>
<?php include_once './view/footer.php';?>