<?php include_once APP_DIR . '/view/menu.php';?>
    <!--instalation de Tiny MCE-->
    <script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="<?=WWW_DIR?>public/js/edit.js"></script>
    <!--View de l'édition de posts-->
    <div class="contentadmin">
        <?php include_once APP_DIR . '/view/sidemenu.php';?>
            <div class="zonecentre">
                <h2>Editer un article</h2>

                <form class="addpostform" action="<?=WWW_DIR?>Post/editPost" method="POST">
                    <input type="text" placeholder="Titre de votre article" name="titre" required value="<?=$post['title']?>">

                    <textarea id="edit" name="article" cols="30" rows="10" placeholder="Rédigez votre article">
                        <?=$post['content']?>
                    </textarea>

                    <input class="inputid" type="text" name="post_id" value="<?=$post['id']?>">
                    <input class="submitcom" type="submit" value="Envoyer l'article" name="submit">
                </form>
            </div>
    </div>
<?php include_once APP_DIR . '/view/footer.php';?>
