<?php
    require_once "config.php"; // Inclui o arquivo de configuração

    // se o txt_prato enviado pelo método post não estiver vazio então:
    if (!empty($_POST['txt_prato'])) {

        $prato = $_POST['txt_prato']; // Armazena o valor de 'txt_prato' na variável $prato
        $cardapio = $_POST['txt_cardapio']; // Nota: Esta linha sobrepõe o valor anterior de $prato com o valor de 'txt_cardapio'
        $foto = $_FILES['file_foto']['name']; // Armazena o nome do arquivo da foto na variável $foto
        $foto = str_replace(" ", " ", $foto); // o espaço não é necessário para criar strings vazias, mas é utilizado para facilitar a visualização

        // Caminho Temporário
        $foto_temp = $_FILES['file_foto']['tmp_name']; // Armazena o caminho temporário da foto na variável $foto_temp
        $destino = "img/" . $foto; // Define o destino final da foto 
    }

    // cadastrar
    if (isset($_GET['acao']) && $_GET['acao'] == 'cadastrar') {
        if (move_uploaded_file($foto_temp, $destino)) { // Move o arquivo de foto para o destino final
            $insert = $pdo->prepare("INSERT INTO pratos (idcardapio, prato, foto) VALUES (?, ?, ?)"); // Prepara a inserção dos dados na tabela 'pratos'

            $insert->bindValue(1, $cardapio); // Vincula o valor de $cardapio ao primeiro parâmetro da consulta
            $insert->bindValue(2, $prato); // Vincula o valor de $prato ao segundo parâmetro da consulta
            $insert->bindValue(3, $foto); // Vincula o valor de $foto ao terceiro parâmetro da consulta
            $insert->execute(); // Executa a consulta SQL

            header("Location: pgPrato.php"); // Redireciona para a página 'pgPrato.php'
        }
    }

    // excluir
    if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
        // echo "Cardápio excluído: id= ". $_GET['id'] . "<br>Foto: ". $_GET['foto'];
        $id = $_GET['id']; // Armazena o id do prato a ser excluído
        $foto = $_GET['foto']; // Armazena o nome da foto a ser excluída

        $del = $pdo->prepare("DELETE FROM pratos WHERE idprato = ?"); // Prepara a exclusão do prato no banco de dados
        $del->bindValue(1, $id); // Vincula o valor de $id ao primeiro parâmetro da consulta
        $del->execute(); // Executa a consulta SQL

        unlink('img/' . $foto); // apaga a foto
        header("Location: pgPrato.php"); // Redireciona para a página 'pgPrato.php'
    }

    // editar
    if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {
        // echo "Cardápio excluído: id= ". $_GET['id'] . "<br>Foto: ". $_GET['foto'];
        $id = $_GET['id']; // Armazena o id do prato a ser editado
        $fotodb = $_GET['foto']; // Armazena o nome da foto atual

        $id = $_GET['id'];
        $fotodb = $_GET['foto'];
        $idcardapio = $_POST['txt_cardapio'];

        // //teste
        if ($_FILES['file_foto']['size'] == 0) {
            // echo 'Sem foto';
            $edit = $pdo->prepare("UPDATE pratos SET prato = ?, idcardapio = ? WHERE idprato = ?"); // Prepara a atualização do prato sem alterar a foto
            $edit ->bindValue(1, $prato); // Vincula o valor de $prato ao primeiro parâmetro da consulta
            $edit ->bindValue(2, $idcardapio); 
            $edit ->bindValue(3, $id); // Vincula o valor de $id ao segundo parâmetro da consulta
            $edit ->execute(); // Executa a consulta SQL

            header("Location: pgPrato.php"); // Redireciona para a página 'pgPrato.php'
        } else {
            // echo 'Com foto';
            unlink('img/' . $fotodb); // Exclui a foto antiga
            if (move_uploaded_file($foto_temp, $destino)) { // Move a nova foto para o destino final
                $edit = $pdo->prepare("UPDATE pratos SET prato = ?, idcardapio = ?, foto = ? WHERE idprato = ?"); // Prepara a atualização do prato com a nova foto

                $edit ->bindValue(1, $prato); // Vincula o valor de $prato ao primeiro parâmetro da consulta
                $edit ->bindValue(2, $idcardapio); 
                $edit ->bindValue(3, $foto); // Vincula o valor de $foto ao segundo parâmetro da consulta
                $edit ->bindValue(4, $id); // Vincula o valor de $id ao terceiro parâmetro da consulta
                $edit ->execute(); // Executa a consulta SQL

                header("Location: pgPrato.php"); // Redireciona para a página 'pgPrato.php'
            }
        }
    }

    // $prato = $_POST['txt_prato'];  
    // $foto = $_FILES['file_foto']['name'];

    // echo "prato: ". $prato ."<br> Foto:" . $foto;
?>