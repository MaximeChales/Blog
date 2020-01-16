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
                    <h2><?= $comment['title']?></h2>
                    <div class="auteurcomment"> par
                        <?= $comment['name']?>
                            le
                            <?= $comment['date_add']?>
                    </div>
                    <div class="report"><i class="fas fa-exclamation-triangle"></i> <a class="reportlink" href="#">Signaler le comentaire</a></div>
                </div>
                
            </div>
            <div class="contentchapter">
                <?= $comment['content']?>
            </div>
        </div>
        <?php endforeach?>
    <div class="commentaires">
     <form action="/Projet_auteur/comment/save" method="post">

        <input class="pseudo" type="text" placeholder="Entrez votre pseudo" name="pseudo" required>
        <br>
        <textarea name="commentaire" id="" cols="30" rows="10" placeholder="Rédigez un commentaire" required></textarea>
        <br><br>
        <input class="submitcom" type="submit" value="Envoyer votre commentaire" name="submit">
    </form>
    </div>
</div>