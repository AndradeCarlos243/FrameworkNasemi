<?php

    class Database
    {
        private $link;
        private $engine;
        private $host;
        private $name;
        private $user;
        private $pass;
        private $charset;

        public function __construct()
        {
            $this->engine = IS_LOCAL ? LDB_ENGINE : DB_ENGINE;
            $this->host = IS_LOCAL ? LDB_HOST : DB_HOST;
            $this->name = IS_LOCAL ? LDB_NAME : DB_NAME;
            $this->user = IS_LOCAL ? LDB_USER : DB_USER;
            $this->pass = IS_LOCAL ? LDB_PASS : DB_PASS;
            $this->charset = IS_LOCAL ? LDB_CHARSET : DB_CHARSET;
        }

        public function connect()
        {
            try
            {
                $this->link = new PDO($this->engine.':host='.$this->host.';dbname='.$this->name.';charset='.$this->charset, $this->user, $this->pass);
                return $this->link;
            }
            catch(PDOException $e)
            {
                die(sprintf('No hay conexión a la base de datos, ocurrió el error: %s', $e->getMessage()));
            }
        }

        /**
         * Método para hacer un query a la base de datos
         * 
         * @param string $sql
         * @param array $params
         * @return void
         */
        public static function query(string $sql, array $params)
        {

        }

    }