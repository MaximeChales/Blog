<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Blog Jean Forteroche</title>
  <link rel="stylesheet" href="./public/css/style.css">
</head>
<body>
<h1>Blog de Jean Forteroche</h1>

    <?php require_once ('controller/router.php');?>
    <?php $router = new router();?>
    <?php $router->route();?>
    
</body>
</html>