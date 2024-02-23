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

            //Parámetro $_GET
            print_r($_GET);
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
        }
    }
?>