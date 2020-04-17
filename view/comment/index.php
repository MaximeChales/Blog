<?php include_once APP_DIR . '/view/menu.php';?>
    <div class="enteteadmin">
        <h2> Gestion des commentaires </h2></div>
    <div class="contentreportedcomments">

        <section class="wrap">
            <!-- view de la page de gestion des articles -->

            <?php foreach ($comments as $comment): ?>
                <div class="comments">
                    <div class="titreetnom">
                        <div class="titreposteaccueil">
                            <div class="entetepost">
                                <h2 class="commenttitles"><?=htmlspecialchars($comment['title'])?></h2>

                                <div class="options">
                                    <a class="unreport" href="<?=WWW_DIR?>Comment/cancelReport/<?=$comment['id']?>"><i class="fas fa-times fa-2x"></i></a>
                                    <a class="supprimer" href="<?=WWW_DIR?>Comment/deleteComment/<?=$comment['id']?>"><i class="far fa-trash-alt fa-2x"></i></a>
                                </div>
                            </div>

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
        </section>
    </div>
<?php include_once APP_DIR . '/view/footer.php';?>