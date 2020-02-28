<?php include_once('./view/menu.php'); ?>
<?php include_once('./view/sidemenu.php'); ?>
<script src="https://cdn.tiny.cloud/1/la1xzftsp6554zxi2pbzijdcinms86e70jxbdns1t57rj3v6/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>

<div class="zonecentre"></div>
    <form action="">
    <input  type="text" placeholder="Titre de votre article" name="titre" required value="<? $title?>">
        <br>
        <textarea name="article" cols="30" rows="10" placeholder="Rédigez votre article" required value="<? $content?>"></textarea>
        <br>
        <input class="inputid" type="text" name="post_id" value="<?=$list['id']?>">
        <input class="submitcom" type="submit" value="Envoyer l'article" name="submit">
    </form>
</div>
<?php include_once('./view/footer.php'); ?>