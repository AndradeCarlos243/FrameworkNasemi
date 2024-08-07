<?php

    class Csrf
    {
        private $length = 32;
        private $token;
        private $token_expiration;
        private $expiration_time = 60 * 5;

        public function __construct()
        {
            if(!isset($_SESSION['csrf_token']))
            {
                $this->generate();
                $_SESSION['csrf_token'] = 
                [
                    'token' => $this->token,
                    'expiration' => $this->token_expiration,
                ];
                return;
            }
            $this->token = $_SESSION['csrf_token']['token'];
            $this->token_expiration = $_SESSION['csrf_token']['expiration'];

            return;
        }

        /**
         * Método para generar un token
         * @return Csrf
         * 
         */
        private function generate()
        {
            if(function_exists('bin2hex'))
            {
                $this->token = bin2hex(random_bytes($this->length));
            }
            elseif(function_exists('openssl_random_pseudo_bytes'))
            {
                $this->token = bin2hex(openssl_random_pseudo_bytes($this->length));
            }

            $this->token_expiration = time() + $this->expiration_time;
            return $this;
        }

        /**
         * Función que valida el token existente
         * @param mixed $csrf_token
         * @param mixed $validate_expiration
         * @return bool
         */
        public static function validate($csrf_token, $validate_expiration = false)
        {
            $self = new self();

            //Validando tiempo de expiración del token
            if($validate_expiration && $self->get_expiration()<time())
            {
                return false;
            }

            if($csrf_token !== $self->get_token())
            {
                return false;
            }

            return true;
        } 

        /**
         * Retorno del token en cuestión
         * @return mixed
         */
        public function get_token()
        {
            return $this->token;
        }

        /**
         * Retorno de la hora de expiración del token
         * @return int
         */
        public function get_expiration()
        {
            return $this->expiration_time;
        }
    }