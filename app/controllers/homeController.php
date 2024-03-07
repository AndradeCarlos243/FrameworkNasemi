<?php
    class homeController{
        function __construct(){
            echo 'Clase '.__CLASS__;
        }

        function saludar($id = null, $nombre = null){
            echo sprintf('&nbsp;Saludos %s con id %s qué gusto verte!', $nombre, $id);
        }
    }