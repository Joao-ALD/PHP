<?php
    session_start();

    // unset($_SESSION['autenticado']);
    // header('Location:index.php');

    session_destroy();
    header('Location: index.php'); // ter ou não um espaço antes do index não faz diferença, mas facilita a visualização
?>