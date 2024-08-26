<?php
    $db = "restaurante";
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=" . $db, $user, $pass);
        // php data object = pdo

    } catch (PDOException $erro){
        echo "ERRO :". $erro->getMessage();
        exit;
    }
?>