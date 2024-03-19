<?php
    class homeController{
        function __construct(){
        }

        function index(){
            $datos = 
            [
                'title' => 'NASEMI',
                'bg' => 'dark'
            ];
            
            View::render('bee', $datos);
        }

        function test()
        {
            Redirect::to('https://www.joystick.com.mx/roadmap/');
        }

    }