<?php
    class errorController extends Controller
    {
        function __construct(){
        }
        function index(){
            $datos = 
            [
                'title' => 'Página no encontrada',
                'bg' => 'dark'
            ];
            View::render('404', $datos);
        }
    }