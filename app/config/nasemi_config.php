<?php
    //Conocer si estamos en local o remoto(PRODUCCIÓN)
    define('IS_LOCAL'    , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

    //Definimos el uso horario del sistema
    date_default_timezone_set('America/Mexico_City');

    //Lenguaje
    define('LANG'        , 'es');

    //Ruta base de nuestro proyecto
    define ('BASEPATH'   , IS_LOCAL ? '/FrameworkNasemi/' : '___URL EN PRODUCCIÓN__');

    //Sal del sistema
    define ('AUT_SALT'   , 'nasemi243');

    //Puerto del sistema Y url
    define ('PORT'       ,'3000');
    define ('URL'        , IS_LOCAL ? 'http://127.0.0.1:'.PORT.BASEPATH : '___URL EN PRODUCCIÓN__');

    //Las rutas de nuestros directorios y archivos
    define ('DS'         , DIRECTORY_SEPARATOR);
    define ('ROOT'       , getcwd().DS);

    define ('APP'        , ROOT.'app'.DS);
    define ('CLASSES'    , APP.'classes'.DS);
    define ('CONFIG'     , APP.'config'.DS);
    define ('CONTROLLERS', APP.'controllers'.DS);
    define ('FUNCTIONS'  , APP.'functions'.DS);
    define ('MODELS'     , APP.'models'.DS);
    define ('LOCALCALL'  , '.'.DS);
    
    define ('TEMPLATES'  , ROOT.'templates'.DS);
    define ('INCLUDES'   , TEMPLATES.'includes'.DS);
    define ('MODULES'    , TEMPLATES.'modules'.DS);
    define ('VIEWS'      , TEMPLATES.'views'.DS);

    //RUTAS DE LOS RECUSOS CON LA URL BASE
    define('ASSETS'      , LOCALCALL.'assets'.DS);
    define ('CSS'        , ASSETS.'css'.DS);
    define ('FAVICON'    , ASSETS.'favicon'.DS);
    define ('FONTS'      , ASSETS.'fonts'.DS);
    define ('IMAGES'     , ASSETS.'images'.DS);
    define ('JS'         , ASSETS.'js'.DS);
    define ('PLUGINS'    , ASSETS.'plugins'.DS);
    define ('UPLOADS'    , ASSETS.'uploads'.DS);

    //CONSTANTES PARA LA BD
    //Set para la conexion local
    define('LDB_ENGINE'  , 'mysql');
    define('LDB_HOST'    , 'localhost');
    define ('LDB_NAME'   , 'databasename');
    define ('LDB_USER'   , 'root');
    define ('LDB_PASS'   , '2432303');
    define ('LDB_CHARSET', 'utf8');

    //Set para la conexion de producción
    define('DB_ENGINE'   , 'mysql');
    define('DB_HOST'     , '__REMOTO__');
    define ('DB_NAME'    , '__REMOTO__');
    define ('DB_USER'    , '__REMOTO__');
    define ('DB_PASS'    , '__REMOTO__');
    define ('DB_CHARSET' , 'utf8');

    //EL CONTROLADOR POR DEFECTO // MÉTODO POR DEFECTO / Y EL CONTROLADOR DE ERRORES POR DEFECTO
    define('DEFAULT_CONTROLLER'      , 'home');
    define('DEFAULT_ERROR_CONTROLLER', 'error');
    define('DEFAULT_METHOD'          , 'index');
    