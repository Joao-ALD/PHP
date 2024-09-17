<?php
    class controller{
        //responsável por mostrar o que estiver na pasta view
        public function loadView($viewName, $viewData = array()){
            extract($viewData); //extract cria um nv arquivo no diretório
            require 'views/'.$viewName .'.php';
        }

        //trazer os arquivos da view (menu.php)
        public function loadTemplate($viewName, $viewData = array()){
            require 'views/template.php';
        }

        public function loadViewInTemplate($viewName, $viewData = array()){
            extract($viewData);
            require 'views/' . $viewName.'.php';
        }
    }