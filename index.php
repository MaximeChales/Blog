<?php 

if(!defined('APP_DIR')){




$site_path = $_SERVER['DOCUMENT_ROOT'];
$current_path = str_replace('\\','/',__FILE__);
$app_path = dirname(str_replace($site_path, '', $current_path));
if ($app_path=="."){
  $app_path="";
}
  define('APP_DIR', $app_path);
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
  <title>Billet simple pour l'Alaska</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="<?=APP_DIR?>/public/css/style.css">
</head>
<body>
 



  <?php require_once ('controller/router.php');?>
  <?php $router = new router();?>
  <?php $router->route();?>
  
</body>
</html>