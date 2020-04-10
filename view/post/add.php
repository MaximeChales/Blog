<?php include_once APP_DIR . '/view/menu.php';?>
<!--instalation de Tiny MCE-->
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?=WWW_DIR?>public/js/add.js"></script>
<div class="contentadmin">
<?php include_once APP_DIR . '/view/sidemenu.php';?>
<!--view de la page de création d'articles-->
  <div class="zonecentre">
    <h2>Rédaction d'un nouvel article</h2>

      <form action="<?=WWW_DIR?>Post/addPost" method="POST" class="addpostform">
      <input  type="text" placeholder="Titre de votre article" name="titre" required>

          <textarea id="article" name="contenu" cols="30" rows="10" placeholder="Rédigez votre article"></textarea>

          <input class="submitcom" type="submit" value="Publier l'article" name="submit">
      </form>
  </div>
</div>
   <?php include_once APP_DIR . '/view/footer.php';?>