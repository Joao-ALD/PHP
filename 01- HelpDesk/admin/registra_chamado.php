<?php

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // $texto = $_POST['titulo'] . $_POST['categoria']. $_POST['descricao']; // concatenação em php é com .(ponto);

    $titulo = str_replace('#', '-' . $_POST['titulo']);
    $categoria = str_replace('#', '-' . $_POST['categoria']);
    $descricao = str_replace('#', '-' . $_POST['descricao']);

    $texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EQL;

    // echo $texto; 

    // Abrir o arquivo

    $arquivo = fopen('arquivo.txt', 'a');

    //Escreva o texto no arquivo 
    fwrite($arquivo, $texto);

    // Feche o arquivo
    fclose($arquivo);

    //Redirecionar
    header('Location: abrir_chamado.php');
?>