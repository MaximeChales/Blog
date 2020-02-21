<?php include_once('./view/menu.php'); ?>
<br><br>
<div class="entete"><h2> Gestion des articles </h2></div>
<br>
<div class="wrap" >
    <div class="contentposts">

    <?php foreach($list as $post ):?>

        <div class="content">
        
        <h2><a href="<?=APP_DIR?>/index.php?url=post/<?= $post['id']?>" target="_blank"><?= $post['title']?></a>
        
        <a href="<?=APP_DIR?>/index.php?url=post/edit/<?= $post['id']?>">modifier</a>
        <a href="<?=APP_DIR?>/index.php?url=post/del/<?= $post['id']?>">effacer</a>
        </h2>
        <div class="post-content"><?= $post['content']?></div>

        <a  class="submit" href="<?=APP_DIR?>/post/<?= $post['id']?>-<?=$post['decodedtitle']?>" >Lire l'article complet</a>
        </div>   

    <?php endforeach?>
    </div>
</div> 
<?php include_once('./view/footer.php'); ?>