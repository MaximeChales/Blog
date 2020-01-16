<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
  <title>Billet simple pour l'Alaska</title>
  <link rel="stylesheet" href="/Projet_auteur/public/css/style.css">
</head>
<body>
  <h1 class="titre">Billet simple pour l'Alaska</h1> 

  <div id="menu">
<ul>
  <li><a href="/Projet_auteur/index.php">Accueil</a></li>
  <li><a href="/Projet_auteur/post/">Tous les chapitres</a>
    <ul class="sousmenu">
      <li><a href="/Projet_auteur/post/1-CHAPITRE_1">Chapitre 1</a></li>
      <li><a href="/Projet_auteur/post/2-CHAPITRE_2">Chapitre 2</a></li>
      <li><a href="/Projet_auteur/post/3-CHAPITRE_3">Chapitre 3</a></li>
      <li><a href="/Projet_auteur/post/4-CHAPITRE_4">Chapitre 4</a></li>
      <li><a href="/Projet_auteur/post/5-CHAPITRE_5">Chapitre 5</a></li>
      <li><a href="/Projet_auteur/post/6-CHAPITRE_6">Chapitre 6</a></li>
      <li><a href="/Projet_auteur/post/7-CHAPITRE_7">Chapitre 7</a></li>
      <li><a href="/Projet_auteur/post/8-CHAPITRE_8">Chapitre 8</a></li>
      <li><a href="/Projet_auteur/post/9-CHAPITRE_9">Chapitre 9</a></li>
    </ul>
  </li>
</ul>
</div>

  
  <?php require_once ('controller/router.php');?>
  <?php $router = new router();?>
  <?php $router->route();?>
  
</body>
</html>