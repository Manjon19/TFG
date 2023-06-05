<?php
    abstract class Controller{

        private $view;

        public function __construct(){
            
        }

        protected function load_view($vista="",$params=array()){
            $this->view= new View($vista,$params);

        }

        protected function load_model($modelo){
            $path_model=ROOT.PATH_MODELS.$modelo.".php";
            if(is_file($path_model)){
                include $path_model;
                return new $modelo;
            }else{
                throw new Exception("Modelo no existe");
            }
        }

        abstract public function index();

        
    }