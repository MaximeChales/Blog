<h2><?= $list ['title']?></h2>
<?php foreach($comments as $comment ):?>
<h2><?= $comment['title']?></a></h2>
<?php endforeach?>
<pre><?= print_r ($list)?></pre>
<pre><?= print_r ($comments)?></pre>
