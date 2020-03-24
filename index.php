<?php
session_start();
if (!defined('APP_DIR')) {

    $site_path = $_SERVER['DOCUMENT_ROOT'];
    $current_path = str_replace('\\', '/', __FILE__);
    $app_path = dirname(str_replace($site_path, '', $current_path));
    if ($app_path == ".") {
        $app_path = "";
    }
    define('APP_DIR', $app_path);
}
?>


  <?php require_once 'controller/router.php';?>
  <?php $router = new router();?>
  <?php $router->route();?>
