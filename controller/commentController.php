<?php 
class commentController
{
    public function add(){
        require ('view/comment/add.php');
    }
    public function save(){
        print_r($_POST);
    }
    public function report(){
        echo('report');
        exit;

    }
}