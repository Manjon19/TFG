<?php
/////Configuraciones de la aplicación
    /////Path al core
    define("CORE","system/core/");
    /////ROOT de nuestra aplicacion
    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/Autoescuela_Manjon/");
    /////URL BASE
    define("BASE_URL","http://localhost/Autoescuela_Manjon/");
    /////Path a los controladores de la aplicacion
    define("PATH_CONTROLLERS","app/controllers/");
    /////Path a las vistas de la aplicacion
    define("PATH_VIEWS","app/views/");
    /////Path a los modelos de la aplicacion
    define("PATH_MODELS","app/models/");
    /////Controlador por defecto
    define("DEFAULT_CONTROLLER","Inicio");
    /////Acceso a BBDD
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "autoescuelamanjon");