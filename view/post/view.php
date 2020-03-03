<?php include_once('./view/menu.php'); ?>

<div class="wrap">
    <div class="bloctexte">
        <h2 class="titreposteaccueil"><?= $list ['title']?></h2>
        <div class="contentchapter">
            <?= $list ['content']?>
        </div>
    </div>
    <br>
    <br>



    <?php foreach($comments as $comment ):?>
        <div class="comments">
            <div class="titreetnom">
                <div class="titreposteaccueil">
                    <h2 class="commenttitles"><?= $comment['title']?></h2>
                    <div class="auteurcomment"> par
                        <?= $comment['name']?>
                            le
                            <?= $comment['date_add']?>
                    </div>
                    <?php if($comment['status']==0):?>
                     <a class="report" href='#' id="<?= $comment['id']?>">Signaler le commentaire</a>
                <?php endif?>
                
                </div>
                
            </div>
            <div class="contentchapter" id="c<?= $comment['id']?>">
               <div class="contentcomment <?php if($comment['status']==1):?>flouterletext <?php endif?>">
               <?= $comment['content']?>
               </div> 
            </div>
        </div>
        <?php endforeach?>
    <div class="commentaires" 
<?php
?>>
    
     <form action="<?=APP_DIR?>/comment/save" method="post">

       <input class="email" type="email" placeholder="Entrez votre adresse email" name="email" required>
        <br>
        <input class="pseudo" type="text" placeholder="Entrez votre pseudo" name="pseudo" required>
        <br>
        <input class="titre" type="text" placeholder="Entrez le titre de votre message" name="title" required>
        <br>
        <textarea name="commentaire" cols="30" rows="10" placeholder="Rédigez un commentaire" required></textarea>
        <br>
        <input class="inputid" type="text" name="post_id" value="<?=$list['id']?>">
        <input class="submitcom" type="submit" value="Envoyer le commentaire" name="submit">

    </form>
    </div>
</div>

<script>
$('.report').on('click',function(){
    var comment_id = $(this).prop('id');
$.ajax({
  url: "<?=APP_DIR?>/comment/report",
  data: {
    id: comment_id
  },
  success: function( result ) {  
  alert('Message signalé avec succès !');
  $('#'+comment_id).hide();
  $('#c'+comment_id).addClass('flouterletext')
 

  }
   
});
});
</script>
<?php include_once('./view/footer.php'); ?>