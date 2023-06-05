<?php
    class Router{

        //Propiedades de la Clase
        private $uri;   //Array que contiene las diferentes partes de la URI
        private $controller;
        private $method;
        private $param;


        public function __construct(){
            $this->setUri();
            $this->setController();
            $this->setMethod();
            $this->setParam();
        }

        //Metodos Setters
        public function setUri(){
            $this->uri=explode("/",$_SERVER['REQUEST_URI']);
        }
        public function setController(){
            $this->controller=$this->uri[2]==""? DEFAULT_CONTROLLER :$this->uri[2];
        }
        public function setMethod(){
            $this->method=empty($this->uri[3])?"index":$this->uri[3];
        }
        public function setParam(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $this->param=$_POST;
            }else{
                $this->param=!isset($this->uri[4])?"":$this->uri[4];
            }
        }
        //Metodos Getters
        public function getUri(){
            return $this->uri;
        }
        public function getController(){
            return $this->controller;
        }
        public function getMethod(){
            return $this->method;
        }
        public function getParam(){
            return $this->param;
        }
    }