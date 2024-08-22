<?php

    require_once "config.php";

    // se o txt_cardapio enviado pelo método post não estiver vazio
    if(!empty($_POST['txt_cardapio'])) { 

        $cardapio = $_POST ['txt_cardapio'];
        $foto = $_FILES['file_foto']['name'];
        $foto = str_replace(" ", " ", $foto); // o espaço não é nescessário para criar strings vazias, mas é utilizado para facilitar a visualização

        //Caminho Temporário
        $foto_temp = $_FILES['file_foto']['tmp_name'];  
        $destino = "img/" . $foto;

        move_uploaded_file($foto_temp, $destino);
    };

    $cardapio = $_POST['txt_cardapio'];  
    $foto = $_FILES['file_foto']['name'];

    echo "Cardapio: ". $cardapio ."<br> Foto:" . $foto;
?>