<?php
    class errorController
    {
        function __construct(){
        }
        function index(){
            $datos = 
            [
                'title' => 'Página no encontrada',
            ];
            View::render('404', $datos);
        }
    }