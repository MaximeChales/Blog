<div class="wrap" >

    <?php foreach($list as $post ):?>

        <div class="content">
        <h2><a href="/Projet_auteur/post/<?= $post['id']?>-<?=$post['decodedtitle']?>" target="_blank"><?= $post['title']?></a></h2>
        
        
        <div class="post-content"  ><?= $post['content']?></div>

        <a  class="submit" href="/Projet_auteur/post/<?= $post['id']?>-<?=$post['decodedtitle']?>" >Lire l'article complet</a>
        </div>   

    <?php endforeach?>
</div> 
