<?php include_once './view/menu.php';?>
<!--instalation de Tiny MCE-->
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="contentadmin">
<?php include_once './view/sidemenu.php';?>
<!--view de la page de création d'articles-->
  <div class="zonecentre">
    <h2>Rédaction d'un nouvel article</h2>
  
      <form action="<?=APP_DIR?>/post/addPost" method="POST" class="addpostform">
      <input  type="text" placeholder="Titre de votre article" name="titre" required>
         
          <textarea id="article" name="contenu" cols="30" rows="10" placeholder="Rédigez votre article"></textarea>
         
          <input class="submitcom" type="submit" value="Publier l'article" name="submit">
      </form>
  </div>
</div>
   <?php include_once './view/footer.php';?>

  <script>
$(document).ready(function() {
  tinymce.init({
  selector: 'textarea#article',
  add_form_submit_trigger : true,
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  ' bold italic backcolor | alignleft aligncenter ' +
  ' alignright alignjustify | bullist numlist outdent indent |' +
  ' removeformat | help',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
});
})
</script>

