<?php
    require_once "config.php";

    // se o txt_cardapio enviado pelo método post não estiver vazio então:
    if(!empty($_POST['txt_cardapio'])) {

        $cardapio = $_POST ['txt_cardapio'];
        $foto = $_FILES['file_foto']['name'];
        $foto = str_replace(" ", " ", $foto); // o espaço não é nescessário para criar strings vazias, mas é utilizado para facilitar a visualização

        //Caminho Temporário
        $foto_temp = $_FILES['file_foto']['tmp_name'];  
        $destino = "img/". $foto;

        
    };

    //cadastrar
    if(isset($_GET['acao']) && $_GET['acao'] == 'cadastrar'){
        if (move_uploaded_file($foto_temp, $destino)){
            $insert = $pdo->prepare("INSERT INTO cardapios (cardapio, foto) VALUES (?, ?)"); //prepare  

            $insert ->bindValue(1, $cardapio);
            $insert ->bindValue(2, $foto);
            $insert->execute();

            header("Location: pgCardapio.php");
        };
    };

    //excluir
    if(isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
        // echo "Cardápio excluído: id= ". $_GET['id'] . "<br>Foto: ". $_GET['foto'];
        $id = $_GET['id'];
        $foto = $_GET ['foto'];

        $del = $pdo -> prepare("DELETE FROM cardapios WHERE idcardapio = ?");
        $del -> bindValue(1, $id);
        $del -> execute();

        unlink('img/'. $foto); //apaga a foto 
        header("Location: pgCardapio.php");
    }

    //editar
    if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
        // echo "Cardápio excluído: id= ". $_GET['id'] . "<br>Foto: ". $_GET['foto'];
        $id = $_GET['id'];
        $fotodb = $_GET ['foto'];

        // //teste
        if($_FILES['file_foto']['size'] == 0){
            // echo 'Sem foto';
            $edit = $pdo -> prepare("UPDATE cardapios SET cardapio = ? WHERE idcardapio = ?");
            $edit ->bindValue(1, $cardapio);
            $edit ->bindValue(2, $id);
            $edit ->execute();

            header("Location: pgCardapio.php");
        } else {
            // echo 'Com foto';
            unlink('img/' . $fotodb);
                if (move_uploaded_file($foto_temp, $destino)){
                    $edit = $pdo->prepare("UPDATE cardapios SET cardapio = ?, foto = ? WHERE idcardapio = ?"); //prepare  
                    
                    $edit ->bindValue(1, $cardapio);
                    $edit ->bindValue(2, $foto);
                    $edit ->bindValue(3, $id);
                    $edit->execute();
        
                    header("Location: pgCardapio.php");
                };
        }
    }

    // $cardapio = $_POST['txt_cardapio'];  
    // $foto = $_FILES['file_foto']['name'];

    // echo "Cardapio: ". $cardapio ."<br> Foto:" . $foto;
?>