<?php include_once './view/menu.php';?>
<!--instalation de Tiny MCE-->
<script src="https://cdn.tiny.cloud/1/opu4jj54o6rpalgywhl7rjize163cy8mmxh4eumwbsph8lt7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!--View de l'édition de posts-->
<div class="contentadmin">
    <?php include_once './view/sidemenu.php';?>
    <div class="zonecentre">
       <h2>Editer un article</h2>
     
    <form  class="addpostform" action="<?=APP_DIR?>/post/editPost" method="POST">
        <input  type="text" placeholder="Titre de votre article" name="titre" required value="<?=$list['title']?>">
            
            <textarea id="edit" name="article" cols="30" rows="10" placeholder="Rédigez votre article"><?=$list['content']?></textarea>
       
            <input class="inputid" type="text" name="post_id" value="<?=$list['id']?>">
            <input class="submitcom" type="submit" value="Envoyer l'article" name="submit">
        </form>
    </div>
    </div>
    <?php include_once './view/footer.php';

?>
</div>

<script>
$(document).ready(function() {
  tinymce.init({
  selector: 'textarea#edit',
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