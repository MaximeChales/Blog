<?php

//démarre le systeme de sessions générant un code de session.
session_start();
if (!defined('APP_DIR')) {
     define('APP_DIR', dirname(getcwd()));
    }

if (!defined('WWW_DIR')) {
  //on cree une regex pour remplacer le public/... par rien 
  $WWW_DIR = preg_replace('#public/.*$#','',$_SERVER['PHP_SELF']);
  define('WWW_DIR', $WWW_DIR);    
}   

require_once APP_DIR.'/controller/Router.php';
$router = new router();
$router->route();
?>
  
 