<?php include_once './view/menu.php';?>
<div class="contentreportedcomments">
  <div class="wrap">
         <!-- view de la page de gestion des articles -->
        <?php foreach ($comments as $comment): ?>
        <div class="comments">
            <div class="titreetnom">
                <div class="titreposteaccueil">
                    <h2 class="commenttitles"><?=htmlspecialchars($comment['title'])?><a class="supprimer" href="<?=APP_DIR?>/comment/deleteComment/<?=$comment['id']?>"><i class="far fa-trash-alt"></i></a></h2>
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
  </div>
</div>
<?php include_once './view/footer.php';?>