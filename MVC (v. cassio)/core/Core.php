<?php

class Core{
    public function run(){
        //echo "URL: " . $_GET['url'];

        //meusite.com.br/contatos/cadastrar/1

        $url = '/';

        if(isset($_GET['url'])){
            //$url = $url . $_GET['url'];
            $url .= $_GET['url'];
        }

        echo "URL: " . $url;
    }
}