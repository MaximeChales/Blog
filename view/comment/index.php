<?php include_once('./view/menu.php'); ?>
  <div class="wrap">
        <?php foreach($comments as $comment ):?>
        <div class="comments">
            <div class="titreetnom">
                <div class="titreposteaccueil">
                <div class="options">
                  <a class="supprimer" href="<?=APP_DIR?>/comment/deleteComment/<?= $comment['id']?>"><i class="far fa-trash-alt"></i></a>
                </div>
                    <h2 class="commenttitles"><?= $comment['title']?></h2>
                    <div class="auteurcomment"> par
                            <?= $comment['name']?>
                            le
                            <?= $comment['date_add']?>
                    </div>
                </div>
            </div>
            <div class="contentchapter" id="c<?= $comment['id']?>">
               <div class="contentcomment">
               <?= $comment['content']?>
               </div> 
            </div>
        </div>
        <?php endforeach?>
  </div>
<?php include_once('./view/footer.php'); ?>