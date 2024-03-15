<?php 
    Class View {
        public static function render($view, $data = []){
            //CONVERTIR EL ARRAY ASOCIATIVO EN OBJETO
            $object = to_object($data); //GUARDAMOS EN OBJECT EL OBJETO EXTRAÍDO DE LA FUNCIÓN PARA CONVERTIRLO.
            if(!is_file(VIEWS.CONTROLLER.DS.$view.'View.php')){
                die(sprintf('No existe la vista %sView en el directorio %s', $view, CONTROLLER));
            }
            require_once VIEWS.CONTROLLER.DS.$view.'View.php';
            exit();
        }
    }