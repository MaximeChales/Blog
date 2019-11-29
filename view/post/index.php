<?php foreach($list as $post ):?>
<h2><a href="/Projet_auteur/index.php?url=post/<?= $post['id']?>" target="_blank"><?= $post['title']?></a></h2>
<div ><?= $post['content']?></div>
<?php endforeach?>
