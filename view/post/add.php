<?php include_once('./view/menu.php');?>
<script src="https://cdn.tiny.cloud/1/la1xzftsp6554zxi2pbzijdcinms86e70jxbdns1t57rj3v6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<div class="contentadmin">
<?php include_once('./view/sidemenu.php');?>
  <div class="zonecentre">
    <h2>Rédaction d'un nouvel article</h2>
    <br><br>
      <form action="<?=APP_DIR?>/post/addPost" method="POST">
      <input  type="text" placeholder="Titre de votre article" name="titre" required>
          <br><br>
          <textarea id="article" name="contenu" cols="30" rows="10" placeholder="Rédigez votre article"></textarea>
          <br>
          <input class="submitcom" type="submit" value="Publier l'article" name="submit">
      </form>
  </div>
</div>
   <?php include_once('./view/footer.php');?>

  <script>
$(document).ready(function() { 
  tinymce.init({
  selector: 'textarea#article',
  add_form_submit_trigger : false,
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

