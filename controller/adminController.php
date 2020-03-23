<?php
class AdminController
{
    public function index()
    {
        if (isset($_SESSION['is_connected']) && $_SESSION['is_connected']) {
            require 'view/admin/index.php';
        } else {
            header('Location: ' . APP_DIR . '/user/login');
        }
    }
}
