<?php
    //Prueba de funciones core
    function to_object($array){
        $array = $array ? (object)$array : null;
        return $array;
    }

    function get_sitename() {
        return 'Bee framework';
      }
      
      function now() {
        return date('Y-m-d H:i:s');
      }