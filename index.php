<?php
    define("BASEPATH",true);
    require "system/config.php";
    //Incluir las clases del core
    require "system/core/autoload.php";
    //Instanciar la clase Router
    $router=new Router();
    session_start();
    $controlador=$router->getController();
    $metodo=$router->getMethod();
    $parametro=$router->getParam();


    //Comprobar que el controlador exista
    if(!is_file(PATH_CONTROLLERS.$controlador.".php")){
        $controlador="ErrorPage";
    }
    //Cargar el controlador escrito en la URI
    include PATH_CONTROLLERS.$controlador.".php";

    //Instanciamos el controlador
    $miControlador=new $controlador();

    //Comprobar que esa clase controladora tenga el metodo que se quiere ejecutar
    if(!method_exists($controlador,$metodo)){
        $metodo="index";
    }


    //Ejecutamos metodo en la URI
    if(empty($parametro)){
        $miControlador->$metodo();
    }else{
        $miControlador->$metodo($parametro);
    }