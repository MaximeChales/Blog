<?php
class AdminController
{
    public function index()
    {
        if (isset($_SESSION['is_connected']) && $_SESSION['is_connected']) {
            require APP_DIR.'/view/admin/index.php';
        } else {
            header('Location: ' . WWW_DIR . 'user/login');
        }
    }
}
