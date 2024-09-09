<?php

    require 'environment.php';



    $config = array();

        if(ENVIRONMENT == 'development'){
            define("Base_URL", "http://localhost//PHP/03-MVC-Base");            
            $config['dbname'] = 'mvc';
            $config['host'] = 'localhost';
            $config['dbuser'] = 'root';
            $config['dbpass'] = '';
        }
        else {
            define("Base_URL", "http://localondeEstaSendoHospedado.com.br/");
            $config['dbname'] = 'mvc';
            $config['host'] = 'localhost';
            $config['dbuser'] = 'root';
            $config['dbpass'] = '';
        };
    global $db;

    try {
        $db = new PDO("mysql:dbname=".$config['dbname'].";host".$config['host'], $config['dbuser'], $config['dbpass']);
    } 
    catch(PDOException $e){
        echo 'ERRO'.$e -> getMessage();
        exit;
    };
?>