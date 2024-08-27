<?php
require_once "config.php";

// se o txt_cardapio enviado pelo método post não estiver vazio então:
if ($_FILES['file_foto']['size'] != 0) {

    // $cardapio = $_POST ['txt_cardapio'];
    $foto = $_FILES['file_foto']['name'];
    $foto = str_replace(" ", " ", $foto); // o espaço não é nescessário para criar strings vazias, mas é utilizado para facilitar a visualização

    //Caminho Temporário
    $foto_temp = $_FILES['file_foto']['tmp_name'];
    $destino = "img/" . $foto;
}
;

//cadastrar
if (isset($_GET['acao']) && $_GET['acao'] == 'cadastrar') {
    if (move_uploaded_file($foto_temp, $destino)) {
        $insert = $pdo->prepare("INSERT INTO banner (foto) VALUES (?)"); //prepare  

        $insert->bindValue(1, $foto);
        $insert->execute();

        header("Location: pgbaner.php");
    }
    ;
}
;

//excluir
if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
    // echo "Cardápio excluído: id= ". $_GET['id'] . "<br>Foto: ". $_GET['foto'];
    $id = $_GET['id'];
    $foto = $_GET['foto'];

    $del = $pdo->prepare("DELETE FROM banner WHERE idbanner = ?");
    $del->bindValue(1, $id);
    $del->execute();

    unlink('img/' . $foto); //apaga a foto 
    header("Location: pgbaner.php");
}

//editar
if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {
    // echo "Cardápio excluído: id= ". $_GET['id'] . "<br>Foto: ". $_GET['foto'];
    $id = $_GET['id'];
    $fotodb = $_GET['foto'];

    // //teste
    if ($_FILES['file_foto']['size'] == 0) {
        header("Location: pgbaner.php");
    } else {
        // echo 'Com foto';
        unlink('img/' . $fotodb);
        if (move_uploaded_file($foto_temp, $destino)) {
            $edit = $pdo->prepare("UPDATE banner SET foto = ? WHERE idbanner = ?"); //prepare  

            $edit->bindValue(1, $foto);
            $edit->bindValue(2, $id);
            $edit->execute();

            header("Location: pgbaner.php");
        }
        ;
    }
    ;
}
;

// $cardapio = $_POST['txt_cardapio'];  
// $foto = $_FILES['file_foto']['name'];

// echo "Cardapio: ". $cardapio ."<br> Foto:" . $foto;
?>