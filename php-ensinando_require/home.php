<?php
    // include("menu.php") // include - caso tente acessar algo inexistente devolve warning, mas ainda permitindo o carregamento do site 

    require "menu2.php"; // require - caso tente acessar algo inexistente devolve fatal error, impedindo o carregamento
    require_once "menu2.php"; //impede a repetição
?>

<hr>
restante do conteudo da pag