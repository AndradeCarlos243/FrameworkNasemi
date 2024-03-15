<?php
    class homeController{
        function __construct(){
        }

        function index(){
            $datos = 
            [
                'title' => 'NASEMI',
            ];
            
            View::render('bee', $datos);
        }

    }