<?php
    Class Autoloader
    {
        /**
         * Método encargado de ejecutar el autocargador de forma estática
         * @return void
         */
        public static function init(){
            spl_autoload_register([__CLASS__, 'autoload']);
        }

        private static function autoload($class)
        {
            if(is_file(CLASSES.$class.'.php'))
            {
                require_once CLASSES.$class.'.php';
            }elseif(is_file(CONTROLLERS.$class.'.php')){
                require_once CONTROLLERS.$class.'.php';
            }elseif(is_file(MODELS.$class.'Model.php')){
                require_once MODELS.$class.'Model.php';
            }

            return;
        }
    }