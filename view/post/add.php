<?php include_once('./view/menu.php');?>
<script src="https://cdn.tiny.cloud/1/la1xzftsp6554zxi2pbzijdcinms86e70jxbdns1t57rj3v6/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>



<div class="zonecentre">
    <form action="<?=APP_DIR?>/comment/add">
    <input  type="text" placeholder="Titre de votre article" name="titre" required>
        <br>
        <input type="text" placeholder="Entrez" name="pseudo" required>
        <br>
        <textarea name="article" cols="30" rows="10" placeholder="Rédigez votre article" required></textarea>
        <br>
        <input class="inputid" type="text" name="post_id" value="<?=$list['id']?>">
        <input class="submitcom" type="submit" value="Envoyer l'article" name="submit">
    </form>
</div>


       <?php include_once('./view/footer.php');
        ?>
