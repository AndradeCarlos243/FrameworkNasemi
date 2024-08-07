<?php
    class homeController extends Controller{
        function __construct(){
        }

        function index(){
            //Actualizar un usuario
            try
            {
                $user = new usuarioModel();
                $user->name = "Simón";
                $user->username = "el gran varón";
                $user->email = "simon@simon.com";
                $user->id = 6;
                print_r($user->update());
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
            die;
            //Insertar nuevo usuario
            try
            {
                $user = new usuarioModel();
                $user->name = "Nasemi";
                $user->username = "nenechi";
                $user->email = "ejemplo@ejemplo.com";
                $user->created_at = now();
                $identificador = $user->add();
                echo $identificador;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
            die;
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

            echo "<h6>Probando la base de datos</h6>";
            echo "<pre>";
            try
            {
                // SELECT
                $sql = "SELECT * FROM test WHERE id = :id AND name = :name;";
                $params = [
                    ":id" => 1,
                    ":name" => "John Doe"
                ];
                $resultado = Database::query($sql, $params);
                print_r($resultado);

                // INSERT
                // $sql = "INSERT INTO test (name, email, created_at) VALUES (:name, :email, :created_at)";
                // $params = [
                //     ":name" => "Luis Julian",
                //     ":email" => "luisj@gmail.com",
                //     ":created_at" => now(),
                // ];
                // $id = Database::query($sql, $params);
                // print_r($id);

                // UPDATE
                $sql = "UPDATE test SET name = :name, email = :email WHERE id = :id;";
                $params = [
                    ":name" => "Luis Diego",
                    ":email" => "luisd@gmail.com",
                    ":id" => 4,
                ];
                $resultado = Database::query($sql, $params);
                echo ($resultado) ? "ACTUALIZADO CORRECTAMENTE." : "ERROR AL ACTUALIZAR.";
            }
            catch(Exception $e)
            {
                echo "Hubo un error: " . $e->getMessage();
            }
            echo "</pre>";
            View::render('test');
        }

    }