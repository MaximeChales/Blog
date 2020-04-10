<?php include_once APP_DIR . '/view/menu.php';?>
<div class="enteteadmin"><h2> Gestion des commentaires </h2></div>
<div class="contentreportedcomments">

  <section  class="wrap">
         <!-- view de la page de gestion des articles -->



        <?php foreach ($comments as $comment): ?>
        <div class="comments">
            <div class="titreetnom">
                <div class="titreposteaccueil">
                    <h2 class="commenttitles"><?=htmlspecialchars($comment['title'])?>
                        <div class="options">
                            <a class="unreport" href=""><i class="fas fa-times"></i></a>
                            <a class="supprimer" href="<?=WWW_DIR?>Comment/deleteComment/<?=$comment['id']?>"><i class="far fa-trash-alt"></i></a>   
                        </div>
                    </h2>
                    
                    <div class="auteurcomment"> par
                            <?=htmlspecialchars($comment['name'])?>
                            le
                            <?=$comment['date_add']?>
                    </div>
                </div>
            </div>
            <div class="contentchapter" id="c<?=$comment['id']?>">
               <div class="contentcomment">
               <?=htmlspecialchars($comment['content'])?>
               </div>
            </div>
        </div>
        <?php endforeach?>
  </section >
</div>
<?php include_once APP_DIR . '/view/footer.php';?>

<script>
$('.unreport').on('click',function(){
    var comment_id = $(this).prop('id');
    $.ajax({
    url: "<?=WWW_DIR?>Comment/cancelReport/<?=$comment['id']?>",
    data: {
        id: comment_id
    },
    success: function( result ) {
        alert('Signalement annulé avec succès !');
         $('#'+comment_id).hide();


         

    }
    });
});
</script>