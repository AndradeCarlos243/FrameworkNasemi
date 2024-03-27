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

        function flash()
        {
            Flasher::new('Hola mundo soy una notificación dinámica', 'success');
            View::render('flash');
        }

        function test()
        {
            $db = new Database();
            $db->connect();
            
            View::render('test');
        }

    }