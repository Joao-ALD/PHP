<?php
#region teste 
    // echo 'Teste ok!';

    // print_r($_GET);

    // echo '<br>';
    // echo $_GET['email'];
    // echo '<br>';
    // echo $_GET ['senha'];

    // print_r($_POST);

    // echo '<br>';
    // echo $_POST['email'];
    // echo '<br>';
    // echo $_POST ['senha'];
#endregion

    session_start();

    $usuario_autenticado = false;

    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '1234'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcd')
    );

    foreach($usuarios_app as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
        };
    };

    if ($usuario_autenticado) {
        //echo 'Usuario autenticado com Sucesso!';
        $_SESSION['autenticado'] = 'SIM';
        header('Location:home.php');
    }
    else {
        // echo 'Erro de autenticação';
        $_SESSION['autenticado'] = 'NÃO';
        header('location:index.php?login=erro');
    };
?>