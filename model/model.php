<?php

class Model
{
    protected $db = null;

    public function __construct()
    {
        $config = parse_ini_file(APP_DIR.'/config/config.ini', true);
        $server = $config['DataBase']['server'];
        $dbname = $config['DataBase']['dbName'];
        $login = $config['DataBase']['login'];
        $password = $config['DataBase']['password'];
        $this->db = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8", $login, $password);
        
    }        

}

