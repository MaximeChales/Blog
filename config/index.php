<div class="wrap" >

    <?php foreach($list as $post ):?>

        <div class="content">
        <h2><a href="/Projet_auteur/index.php?url=post/<?= $post['id']?>" target="_blank"><?= $post['title']?></a></h2>
        
        
        <div class="post-content" style="width:auto; padding:10px; height:auto;" ><?= $post['content']?></div>

        <a  class="submit" href="/Projet_auteur/post/<?= $post['id']?>-<?=$post['decodedtitle']?> " >Lire l'article complet</a>
        </div>   

    <?php endforeach?>
</div> 