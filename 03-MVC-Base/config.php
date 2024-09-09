<?php
    $config = array(
        'dbename' => 'mvc',
        'host'=> 'localhost',
        'user' => 'root',
        'dbpass' => ''
    );

    try {
        $db = new PDO("mysql:dbname=".$config['dbname']."host".$config['host'], $config['dbuser'], $config['dbpass']);
    } 
    catch(PDOException $e){
        echo 'ERRO'.$e -> getMessage();
        exit;
    }
?>