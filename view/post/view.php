<?php include_once APP_DIR. './view/menu.php';?>

<div class="wrap">
<!-- Un commence par afficher le post avec le titre et le contenu-->
    <div class="bloctexte">
        <h2 class="titreposteaccueil"><?=$list['title']?></h2>
        <div class="contentchapter">
            <?=$list['content']?>
        </div>
    </div>


    <!-- On affiche ensuite les commentaires correspondant au post avec le titre l'auteur la date d'écriture et le contenu du commentaire

    On utilise htmlspecialchars pour empecher les visiteurs d'ajouter du code à partir des formulaires-->
    <?php foreach ($comments as $comment): ?>
        <div class="comments">
            <div class="titreetnom">
                <div class="titreposteaccueil">
                    <h2 class="commenttitles"><?=htmlspecialchars($comment['title'])?></h2>
                    <div class="auteurcomment"> par
                        <?=htmlspecialchars($comment['name'])?>
                            le
                            <?=$comment['date_add']?>
                    </div>
                    <?php if ($comment['status'] == 0): ?>
                     <a class="report" href='#' id="<?=$comment['id']?>">Signaler le commentaire</a>
                    <?php endif?>

                </div>

            </div>
            <div class="contentchapter" id="c<?=$comment['id']?>">
               <div class="contentcomment <?php if ($comment['status'] == 1): ?>flouterletext <?php endif?>">
               <?=htmlspecialchars($comment['content'])?>
               </div>
            </div>
        </div>
        <?php endforeach?>


    <div class="commentaires">
     <h2>Donnez nous votre avis sur cet article</h2>
<!--Forumulaire permettant d'envoyer un commentaire. Relié au php et donc à la bdd grace à l'action save -->

     <form name="comments" action="<?=APP_DIR?>/comment/save" method="post">

       <input class="email" type="text" placeholder="Entrez votre adresse email" name="email">

        <input class="pseudo" type="text" placeholder="Entrez votre pseudo" name="pseudo">

        <input class="titre" type="text" placeholder="Entrez le titre de votre message" name="title">

        <textarea name="commentaire" cols="30" rows="10" placeholder="Rédigez un commentaire"></textarea>

        <input class="inputid" type="text" name="post_id" value="<?=$list['id']?>">

        <input class="submitcom" type="submit" value="Envoyer le commentaire" name="submit">
        
    </form>
    </div>
</div>

<!-- Utilsiation d'ajax pour flouter le texte si le commentaire est signalé-->
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

<?php include_once APP_DIR. './view/footer.php';?>