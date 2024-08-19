<?php 
    session_start();

    //! é o inverso, no caso, !isset = se não existir(isset é se existe) //header é uma função nativa de redirecionamento //O primeiro session usa o () pois esta junto do !isset -->
    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){ 
        header('Location:index.php?login=erro2');
    };
?>