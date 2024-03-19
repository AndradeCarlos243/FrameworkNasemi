<?php 
    class Redirect
    {
        private $location;

        /**
         * Método para redirigir al usuario al método seleccionado
         * @return void
         */
        public static function to($location){
            $self = new self();
            $self->location = $location;
           
            //Preguntamos si es que las cabeceras ya fueron enviadas
            if(headers_sent())
            {
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.URL.$self->location.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.URL.$self->location.'" />';
                echo '</noscript>';
                die();
            }

            //Redireccionamos a otro sitio externo
            if(strpos($self->location, 'http') !== false){
                header('Location: '.$self->location);
                die();
            }

            //Redireccionamos a otra sección del sitio
            header('Location: '.URL.$self->location);
            die();
        }
    }