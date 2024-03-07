<?php
    class Nasemi 
    {
        //Propiedades del framework
        private $framework = 'Nasemi Framework';
        private $version = '1.0.0';
        private $uri = [];

        //La funcion principal que se invoca al instanciar la clase
        function __construct()
        {
            $this->init();
        }

        /**
         * Método que inicializa cada método de manera subsecuente
         * @return void
         */
        private function init(){
            $this->init_session();
            $this->init_load_config();
            $this->init_load_functions();
            $this->init_autoload();
            $this->filter_url();
            $this->dispatch();
        }

        /**
         * Método para iniciar la sesión en el sistema
         * @return void
         */
        private function init_session()
        {
            if(!session_start())
            {
                session_start();
            }
            return;
        }

        /**
         * Método para cargar la configuración del sistema
         * @return void
         */
        private function init_load_config()
        {
            $file  = 'nasemi_config.php';
            if(!is_file('app/config/'.$file))
            {
                die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
            }
            else
            {
                require_once 'app/config/'.$file;
            }
            return;
        }

        /**
         * Método para inicializar las funciones del núcleo
         * @return void
         */
        private function init_load_functions()
        {
            $file  = 'nasemi_core_functions.php';
            if(!is_file(FUNCTIONS.$file))
            {
                die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
            }
            else
            {
                //Cargamos el archivo de funciones del sistema
                require_once FUNCTIONS.$file;
            }

            $file  = 'nasemi_custom_functions.php';
            if(!is_file(FUNCTIONS.$file))
            {
                die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
            }
            else
            {
                //Cargamos las funciones personalizadas
                require_once FUNCTIONS.$file;
            }
            return;
        }

        
        /**
         * Método para el autoload de todos los archivos
         * 
         * @return void
         */
        private function init_autoload()
        {
            require_once CLASSES.'Database.php';
            require_once CLASSES.'Model.php';
            require_once CLASSES.'Controller.php';
            require_once CONTROLLERS.DEFAULT_CONTROLLER.'Controller.php';
            require_once CONTROLLERS.DEFAULT_ERROR_CONTROLLER.'Controller.php';

            return;
        }
    
        /**
         * Método para el manejo de la URI, filtrar y descomponer elementos de la uri
         * 
         * @return void
         */
        private function filter_url(){
            if(isset($_GET['uri'])){
                $this->uri = $_GET['uri'];
                $this->uri = rtrim($this->uri, '/');
                $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
                $this->uri = explode('/', strtolower($this->uri));
                return $this->uri;
            }
        }

        /**
         * Método para ejecutar de forma automática el controlador solicitado por el usuario
         * su método y parámetros
         * 
         * @return void
         */
        private function dispatch(){
            //Filtrar la URL y separar la URI
            $this->filter_url();

            //////////////////////////////CONTROLADOR///////////////////////////////////
            //Controlador, saber si se está pasando un controlador
            //$this->uri[0] es el controlador en cuestion

            if(isset($this->uri[0]))
            {
                $current_controller = $this->uri[0];
                unset($this->uri[0]);
            }
            else
            {
                $current_controller = DEFAULT_CONTROLLER;
            }
            
            //EJECUTAMOS EL CONTROLADOR
            //VERIFICAMOS SI EXISTE UNA CLASE CON EL CONTROLADOR SOLICITADO
            $controller = $current_controller.'Controller';
            if(!class_exists($controller)){
                $controller = DEFAULT_ERROR_CONTROLLER.'Controller';
            }

            //////////////////////////////MÉTODO///////////////////////////////////
            //EJECUCIÓN DEL MÉTODO SOLICITADO
            if(isset($this->uri[1])){
                $method = str_replace('-', '_', $this->uri[1]);
                //COMPROBAMOS SI EXISTE EL MÉTODO SOLICITADO
                if(!method_exists($controller, $method)){
                    $controller = DEFAULT_ERROR_CONTROLLER.'Controller';
                    $current_method = DEFAULT_METHOD;
                }else{
                    $current_method = $method;
                }
            }else{
                $current_method = DEFAULT_METHOD;
            }
            
            unset($this->uri[1]);
            
            //////////////////////////////EJECUCIÓN///////////////////////////////////
            //EJECUTANDO CONTROL Y MÉTODO SEGÚN LA PETICIÓN
            $controller = new $controller;
            $params = array_values(empty($this->uri) ? [] : $this->uri);

            if(empty($params)){
                call_user_func([$controller, $current_method]);
            }else{
                call_user_func_array([$controller, $current_method], $params);
            }

            return;
        }
    }