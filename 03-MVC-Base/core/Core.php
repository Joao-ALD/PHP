<?php
    class Core{
        public function run(){
            // echo 'URL:' . $_GET['url'];

            //meusite.com.br/contatos/cadastrar/1 (neste ex. : dominio/controller/ação/parametro)
            // controller faz o redircionamento 

            $url ='/';

            if (isset($_GET['url'])) {
                // $url = $url . $_GET['url'];
                $url .= $_GET['url'];
            }

            // echo "URL: " . $url;

            $params = array();

            if (!empty($url) && $url != '/') { // verifica se foi enviado
                $url = explode('/', $url); //divide o array
                array_shift($url); //remove a "primeira" /

                $currentController = $url[0].'Controller';
                //homeController, qq coisa que vier Controller
                array_shift($url);

                if (isset($url[0]) && !empty($url[0])) {
                    $currentAction = $url[0];
                    array_shift($url);
                }else{
                    $currentAction = 'index';
                }

                if (count($url) > 0) {
                    $params = $url;
                }
            } 
            else{
                $currentController = 'homeController';
                $currentAction = 'index';
            }

            echo 'CONTROLLER: ' . $currentController . '<br>';
            echo 'ACTION: ' . $currentAction . '<br>';
            echo 'PARAMS: ' . print_r($params, true) . '<br>';
        }
    }
?>