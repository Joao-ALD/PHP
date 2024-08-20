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
    $usuario_id = null;

    $usuarios_app = array(
        array('id'=> 1, 'email' => 'adm@teste.com.br', 'senha' => '1234'),
        array('id'=> 2,'email' => 'user@teste.com.br', 'senha' => 'abcd'),
        array('id'=> 3,'email' => 'user@user.com.br', 'senha' => '1234')
    );

    foreach($usuarios_app as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user ['id'];
        };
    };

    if ($usuario_autenticado) {
        //echo 'Usuario autenticado com Sucesso!';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        header('Location:home.php');
    }
    else {
        // echo 'Erro de autenticação';
        $_SESSION['autenticado'] = 'NÃO';
        header('location:index.php?login=erro');
    };
?>